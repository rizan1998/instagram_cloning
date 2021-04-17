<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
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

        $posts = Post::with('user', 'likes')->withCount('likes')
        // sini bisa tambah where bulan ini hari ini dll
        ->whereIn('user_id', $id_list)->orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('posts'));
    }

    public function search(Request $request){
        $querySearch = $request->input('query');
        $posts = Post::with('user', 'likes')->withCount('likes')
        // sini bisa tambah where bulan ini hari ini dll
        ->where('caption', 'like', '%'.$querySearch.'%')->orderBy('created_at', 'desc')->take(10)->get();
        return view('home', compact('posts', 'querySearch'));
    }

    public function loadmore($time){
        $user = Auth::user();
        
        $id_list = $user->following()->pluck('follows.following_id')->toArray();
        $id_list[] = $user->id;

        $posts = Post::with('user', 'likes')->withCount('likes')
        ->whereIn('user_id', $id_list)->orderBy('created_at', 'desc')
        ->whereTime('created_at', '<', Carbon::parse((int)$time)) //untuk parse carbon harus bentuk int jangan string
        ->take(3)->get(); 
        return ['post' => $posts];
    }
}
