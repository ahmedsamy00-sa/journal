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
Route::get('/users', [AuthController::class, 'index']);
Route::post('/users/login',[AuthController::class,'login']);
Route::post('/users/register',[AuthController::class,'register']);


//News Category routes
Route::get('/newsCategory', [NewsCategoryController::class, 'index']);
Route::post('/newsCategory/add', [NewsCategoryController::class, 'store']);


//news routes
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::post('/news/add', [NewsController::class, 'store']);


//hashtag routes
Route::get('/hashtag',[HashtagController::class, 'index']);
Route::post('/hashtag/add/{id}',[HashtagController::class, 'store']);


//video routes
Route::get('/video',[VideoController::class, 'index']);
Route::post('/video/add',[VideoController::class, 'store']);


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
