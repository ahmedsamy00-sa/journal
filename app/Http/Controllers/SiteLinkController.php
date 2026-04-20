<?php

namespace App\Http\Controllers;

use App\Models\Site_info;
use App\Models\Site_link;
use Illuminate\Http\Request;

class SiteLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Site_link::all();
        return response()->json($links, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'url'=>'required|string',
            'site_id'=>'required|exists:site_infos,id'
        ]);

        $link = Site_link::create([
            'name'=>$request->name,
            'url'=>$request->url,
            'site_id'=>$request->site_id
        ]);

        return response()->json([
            'msg'=>'link added',
            $link
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site_link $site_link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site_link $site_link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site_link $site_link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site_link $site_link)
    {
        //
    }
}
