<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = Video::with('news')->get();
        return response()->json($video, 200);
    }


    /**
     * Store a video and link it with it's news
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_url'=> 'string|required',
            'videoStatus'=>'string',
            'news_id'=>'required|exists:news,id'
        ]);
        $video = Video::create([
            'video_url'=>$request->video_url,
            'videoStatus'=>$request->videoStatus,
            'news_id'=>$request->news_id
        ]);
        return response()->json([
            'msg'=>'video added',
            $video
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
