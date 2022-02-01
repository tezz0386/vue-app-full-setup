<?php

use App\Http\Controllers\API\Admin\Banner\BannerController;
use App\Http\Controllers\API\Admin\Setting\SettingController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('add', [BookController::class, 'add']);
    Route::get('edit/{id}', [BookController::class, 'edit']);
    Route::post('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
});

Route::group(['prefix'=>'v1'], function(){
    Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::patch('/setting/{setting}', [SettingController::class, 'update'])->name('setting.update');


        // FOR BANNER
        Route::apiResource('banner', BannerController::class);
        Route::patch('/update-order/banner', [BannerController::class, 'updateOrder'])->name('update-order.banner');
    }); 
});
