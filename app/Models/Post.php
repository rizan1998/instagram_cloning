<?php

namespace App\Models;

use App\Models\LikesTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, LikesTrait;
    protected $guarded = ['id'];
    // protected $with = ['user', 'likes'];

    // comment
    public function comments(){
        return $this->hasMany(Comment::class)->withCount('likes')->orderBy('created_at', 'desc');
    }

    // relasi user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // likes post
    // public function likes(){
    //     return $this->hasMany('App\Models\Like');
    // }
    // like yang sebelumya, struktur table user_id,post_id  

   
}
