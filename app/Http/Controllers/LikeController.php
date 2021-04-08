<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($type, $object_id){

        if($type == "POST"){
            $object = Post::findOrFail($object_id);
        }else{
            $object = Comment::findOrFail($object_id);
        }

        // return redirect('/@userexample1');
      
        $attr = ['user_id' => Auth::user()->id];

        if($object->likes()->where($attr)->exists()){ //exists adalah function mengecek tersedia apa belu
            //dan akan mengembalikan boolean true
            // jika postingan sudah dilike maka

            // karena has many jadi memakai create biasa
            $object->likes()->where($attr)->delete();
            $msg = ['status'=>'UNLIKE'];
            return response()->json($msg);
        }else{

            $object->likes()->create($attr);
            $msg = ['status'=>'LIKE'];
            return response()->json($msg);

        }
    }
}
