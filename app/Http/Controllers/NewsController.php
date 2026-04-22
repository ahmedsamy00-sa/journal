<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
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
    $page = $request->query('page', 1);

    $key = "news_page_{$page}_limit_{$limit}";

    $fromCache = Cache::has($key);

    $news = Cache::remember($key, Carbon::now()->addMinutes(60), function () use ($limit, $page) {
        return News::latest()
            ->with('newsCategory')
            ->paginate($limit, ['*'], 'page', $page);
    });

    return response()->json([
        'from_cache' => $fromCache,
        'key'=>$key,
        'data'=>$news,
    ], 200);
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
        Cache::flush();
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
        Cache::flush();
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
        Cache::flush();
        return response()->json(['msg'=>'news deleted'], 200);    
    }
}
