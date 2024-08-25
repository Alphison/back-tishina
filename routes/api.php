<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/houses', [HouseController::class, 'getAll']);
Route::get('/house/{id}', [HouseController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'getAll']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/home', [HouseController::class, 'getAll']);
});

Route::controller(FeedbackController::class)->group(function () {
    Route::post('/feedback', 'create');
});

Route::controller(AuthController::class)->group(function () {

    Route::post('/login', 'login');

    Route::group(['middleware' => 'auth:sanctum'], function () {

        Route::post('/logout', 'logout');
        Route::get('/me', 'me');
        Route::get('/profile', 'profile');
        
    });    

});
