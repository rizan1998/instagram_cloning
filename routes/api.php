<?php

use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResources; //agar tidak tabrakan
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/test', function(){
    // menggunakan collection karena datanya banyak dan juga singel model
    return PostResources::collection(Post::all());
});