<?php

namespace App\Http\Controllers;

use App\Models\Site_info;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $site = Site_info::with('links', 'contacts')->get();
        return response()->json($site, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo'=>'required|string',
            'icon'=>'required|string',
            'desc'=>'required|string'
        ]);

        $site = Site_info::create([
            'logo'=>$request->logo,
            'icon'=>$request->icon,
            'desc'=>$request->desc
        ]);
        return response()->json([
            'msg'=>'site info added',
            $site
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site_info $site_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site_info $site_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site_info $site_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site_info $site_info)
    {
        //
    }
}
