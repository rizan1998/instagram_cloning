<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Nontification;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id){
      
        $request->validate([
            'body' => 'required',
        ]);
    $user = Auth::user();
    $user->comments()->create([
        'body' => $request->body,
        'post_id' => $post_id
    ]);
    
    // nontification
    $this->nontify($user, $post_id);
    
    return redirect('/posts/'.$post_id);
    }

    private function nontify($user, $post_id){

        $target_id = Post::find($post_id)->user_id;

        if($user->id != $target_id){ //untuk filter jika komentar
        //dilakukan oleh diri sendiri maka tidak perlu nontifikasi
            Notification::create([
                'user_id' => $target_id,
                'post_id' => $post_id,
                'message' => 'kamu mendapat komentar dari ' . $user->username
            ]);
        }    
    }

    public function edit($comment_id){
        $comment = Comment::findOrFail($comment_id);
        return view('post.comment-edit', compact('comment'));
    }

    public function update(Request $request, $comment_id){
        $request->validate([
            'body' => 'required'
        ]);
        $user=Auth::user();
        $comment = Comment::find($comment_id);
        
        if($comment->user_id != $user->id)
        abort(403);

        $comment->update([
            'body' => $request->body
        ]);
        return redirect('/posts/'.$comment->post_id);
    }

    public function destroy($comment_id){
        $comment = Comment::findOrFail($comment_id);
        $user=Auth::user();

        if($comment->user_id != $user->id)
        abort(403);

        $comment->delete();
        // return redirect()->back();
        return redirect('/posts/'.$comment->post_id);
    }
}
