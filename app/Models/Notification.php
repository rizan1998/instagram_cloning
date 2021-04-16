<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // user hasmany
    public function user(){
        return $this->belongsTo(User::class);
    }

    // post hasmany jika ingin mengatur
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
