<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home/{name?}' , function ($name=null){
//     echo "welcome " . $name;
//     // return view('home');
// })->where('name', '[A-Za-z]+');

// //Route::view('/home' , 'home');

// Route::get('/greeting', function () {
//     return 'Hello World';
// })->name('greeting');

// Route::redirect('/here', '/greeting');

//group route

Route::controller(UserController::class)->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/', 'index')->name('user.index');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
    });

});


// Route::get('/user',
// [UserController::class,
//  'index'])->name('user.index');

// Route::get('user/create' ,
//  [UserController::class, 
//  'create'])->name('user.create');

// Route::post('user/store' ,
//  [UserController::class, 'store'])->name('user.store');