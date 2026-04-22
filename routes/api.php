<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SiteContactController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\SiteLinkController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth routes
Route::post('/users/login',[AuthController::class,'login']);
Route::post('/users/register',[AuthController::class,'register']);



Route::middleware(['auth:sanctum'])->group(function () {
    
    //user
    Route::get('/users', [AuthController::class, 'index'])
        ->middleware('role:admin');
    
    
    //News Category routes
    Route::get('/newsCategory', [NewsCategoryController::class, 'index'])
        ->middleware('role:admin,user,author');
    
    Route::post('/newsCategory/add', [NewsCategoryController::class, 'store'])
        ->middleware('role:admin');
    
    
    // news
    Route::get('/news', [NewsController::class, 'index'])
        ->middleware('role:admin,user,author');

    Route::get('/news/{news}', [NewsController::class, 'show'])
        ->middleware('role:admin,user,author');

    Route::post('/news/add', [NewsController::class, 'store'])
    ->middleware('role:admin,author');

    Route::delete('/news/delete/{news}', [NewsController::class, 'destroy'])
    ->middleware('role:admin,author');


    // hashtag
    Route::get('/hashtag', [HashtagController::class, 'index'])
        ->middleware('role:admin,user,author');

    Route::post('/hashtag/add/{id}', [HashtagController::class, 'store'])
        ->middleware('role:admin');


    // video
    Route::get('/video', [VideoController::class, 'index'])
        ->middleware('role:admin,user,author');

    Route::post('/video/add', [VideoController::class, 'store'])
        ->middleware('role:admin');

});

//site info routes
Route::get('/info', [SiteInfoController::class, 'index']);
Route::post('/info/add', [SiteInfoController::class, 'store']);


//site links routes
Route::get('/link', [SiteLinkController::class, 'index']);
Route::post('/link/add', [SiteLinkController::class, 'store']);


//site contact routes
Route::get('/contact', [SiteContactController::class, 'index']);
Route::post('/contact/add', [SiteContactController::class, 'store']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
