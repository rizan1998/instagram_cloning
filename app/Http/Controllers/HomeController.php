<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // timeline orang yang difollow
        // + timeline kita sendiri

        // pluck untuk mengambil spesifik kolom yang ditentukan
        // id from following and current login user
        $id_list = $user->following()->pluck('follows.following_id')->toArray();
        $id_list[] = $user->id;
        // dd($id_list);

        $posts = Post::whereIn('user_id', $id_list)->orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }
}
