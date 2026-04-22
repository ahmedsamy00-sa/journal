<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'=>"required|string",
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|string|unique:users,phone',          
            'password'=>'required|min:8|string',
            'role'=>'string'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'msg'=>'user signed up', 
            'User'=>$user,
            'Token'=>$token
    ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8|string'
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        $checkPassword = Hash::check($request->password, $user->password);
        
        if (!$checkPassword) {
            return response()->json(['msg'=>'Invalid Credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'msg'=>'user logged in', 
            'User'=>$user,
            'Token'=>$token
    ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
