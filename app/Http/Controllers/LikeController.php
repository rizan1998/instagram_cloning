<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($post_id){
        // return redirect('/@userexample1');
        $post = Post::findOrFail($post_id);
        $attr = ['user_id' => Auth::user()->id];

        if($post->likes()->where($attr)->exists()){ //exists adalah function mengecek tersedia apa belu
            //dan akan mengembalikan boolean true
            // jika postingan sudah dilike maka

            // karena has many jadi memakai create biasa
            $post->likes()->where($attr)->delete();
            $msg = ['status'=>'UNLIKE'];
            return response()->json($msg);
        }else{

            $post->likes()->create($attr);
            $msg = ['status'=>'LIKE'];
            return response()->json($msg);

        }
    }
}
