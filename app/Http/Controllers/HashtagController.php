<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hashtag = Cache::remember('hashtags', Carbon::now()->addMinutes(60), function(){
            return Hashtag::with('news')->get();
        }); 
        return response()->json($hashtag, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $request->validate([
            'title'=>'string|required'
        ]);

        $hashtag = Hashtag::firstOrCreate([
            'title'=>$request->title
        ]);
        $news->hashtags()->attach($hashtag->id);

        Cache::flush();
        return response()->json([
            'msg'=> 'hashtag created',
            'news'=>$news,
            'hashtags'=>$hashtag,
            
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hashtag $hashtag)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hashtag $hashtag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hashtag $hashtag)
    {
        //
    }
}
