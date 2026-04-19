<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth routes
Route::get('/users', [AuthController::class, 'index']);
Route::post('users/login',[AuthController::class,'login']);
Route::post('users/register',[AuthController::class,'register']);


//News Category routes
Route::get('/newsCategory', [NewsCategoryController::class, 'index']);
Route::post('/newsCategory/add', [NewsCategoryController::class, 'store']);


//news routes
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::post('/news/add', [NewsController::class, 'store']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
