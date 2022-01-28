<?php

// use App\Support\ImageSupport;
// use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;


// Route::get('/create', function(){
//     return view('form');
// })->name('create');
// Route::post('/create', function(Request $request){
//     $imageSupport = new ImageSupport();
//     $imageSupport->saveAnyImg($request, 'settings', 'logo', 500, 500);
// })->name('save');



Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
