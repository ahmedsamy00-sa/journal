<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 5);
        $news = Cache::remember('news_page_'.request('page', 1), 60, function() use($limit){
            return News::latest()->with('newsCategory')->paginate($limit);
        });
        return response()->json($news, 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title'=>'required|string',
            'image'=>'string|nullable',
            'desc'=>'string|nullable',
            'newsCategory_id'=>'required|exists:news_categories,id',
        ]);

        $news = News::create([
            'title'=>$request->title,
            'image'=>$request->image,
            'desc'=>$request->desc,
            'newsCategory_id'=>$request->newsCategory_id,
            'user_id'=>$user->id
        ]);

        return response()->json($news, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        News::where('id', $news->id)->update([
            'counter' => $news->counter + 1
        ]);
        return response()->json($news->fresh(), 200);
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
        News::query()->delete();
        return response()->json(['msg'=>'news deleted'], 200);    
    }
}
