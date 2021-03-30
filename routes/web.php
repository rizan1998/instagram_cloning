<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
route::get('@{username}', [UserController::class, 'show']);

route::middleware('auth')->group(function(){

Route::get('/home', [HomeController::class, 'index'])->name('home');
//user
Route::get('/user/edit', [UserController::class, 'edit']);
Route::put('/user/edit', [UserController::class, 'update']);
//post 
Route::resource('posts', PostController::class);

});

