<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['user', 'likes'];

    // comment
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // relasi user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // likes post
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    public function is_liked(){
        // like disini mengacu pada function yang sebelumnya ditulis
        // count() akan menghasilkan return true
        return $this->likes->where('user_id', Auth::user()->id )->count();
    }
}
