<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class)->orderBy('created_at', 'asc');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
