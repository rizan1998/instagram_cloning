<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($type, $object_id){

        if($type == "POST"){
            $object = Post::findOrFail($object_id);

            // ambil id post untuk sistem notifikasi
            $post_id = $object->id;
        }else{
            $object = Comment::findOrFail($object_id);

            $post_id = $object->post->id;
        }

        // return redirect('/@userexample1');
      
        $attr = ['user_id' => Auth::user()->id];

        if($object->likes()->where($attr)->exists()){ //exists adalah function mengecek tersedia apa belu
            //dan akan mengembalikan boolean true
            // jika postingan sudah dilike maka

            // karena has many jadi memakai create biasa
            $object->likes()->where($attr)->delete();
            $msg = ['status'=>'UNLIKE'];
            $this->cancelNotify(Auth::user(), $post_id);
            return response()->json($msg);

        }else{

            $object->likes()->create($attr);
            $msg = ['status'=>'LIKE'];
            $this->notify(Auth::user(), $post_id);
            return response()->json($msg);

        }
    }

    
    private function notify($user, $post_id){

        $target_id = Post::find($post_id)->user_id;

        if($user->id != $target_id){ //untuk filter jika komentar
        //dilakukan oleh diri sendiri maka tidak perlu nontifikasi
            Notification::create([
                'user_id' => $target_id,
                'post_id' => $post_id,
                'message' => 'kamu mendapat likes dari ' . $user->username
            ]);
        }    
    }

    public function cancelNotify($user, $post_id){
        $target_id = Post::find($post_id)->user_id;
        if($user->id != $target_id){
            Notification::where('user_id', $target_id)//pemilik postingan
            ->where('post_id', $post_id)
            ->where('message', 'like', '%likes%')->delete();
        }
    }
}
