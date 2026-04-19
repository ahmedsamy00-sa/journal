<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->with('newsCategory')->get();
        return response()->json($news, 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'image'=>'string|nullable',
            'desc'=>'string|nullable',
            'newsStatus'=>'required|string',
            'newsCategory_id'=>'required|exists:news_categories,id'
        ]);

        $news = News::create([
            'title'=>$request->title,
            'image'=>$request->image,
            'desc'=>$request->desc,
            'newsStatus'=>$request->newsStatus,
            'newsCategory_id'=>$request->newsCategory_id,
        ]);

        return response()->json($news, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news = News::with('news_categories')->findOrFail($news);
        return response()->json($news, 200);
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
