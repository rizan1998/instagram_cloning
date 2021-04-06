<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
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
    
    
    return redirect('/posts/'.$post_id);
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
}
