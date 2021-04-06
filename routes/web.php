<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

route::get('/search', [HomeController::class, 'search']);
route::get('@{username}', [UserController::class, 'show']);

route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    //user
    Route::get('/user/edit', [UserController::class, 'edit']);
    Route::put('/user/edit', [UserController::class, 'update']);
    //feed/postingan
    Route::resource('posts', PostController::class);

    // follow
    route::get('/follow/{user_id}', [UserController::class, 'follow']);
    // like
    route::get('/like/{post_id}', [LikeController::class, 'toggle']);
    // comment
    route::post('/comment/{post_id}', [CommentController::class, 'store']);
    route::get('/comment/{comment_id}/edit', [CommentController::class, 'edit']);
    route::put('/comment/{comment_id}', [CommentController::class, 'update']);
    route::delete('/comment/{comment_id}', [CommentController::class, 'delete']);
});

