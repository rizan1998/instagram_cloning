<?php

namespace App\Models;

use App\Models\LikesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, LikesTrait;
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class)->orderBy('created_at', 'asc');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
