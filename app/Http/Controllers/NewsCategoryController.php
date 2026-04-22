<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsCategory = Cache::remember('news_category', 60, function(){
            return NewsCategory::all();
        });
        return response()->json($newsCategory, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|unique:news_categories,name'
        ]);

        $newsCategory = NewsCategory::create([
            'name'=>$request->name
        ]);

        return response()->json($newsCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsCategory $newsCategory)
    {
        //
    }
}
