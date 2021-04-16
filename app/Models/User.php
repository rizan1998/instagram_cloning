<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // relasi posts
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // following user
    public function following(){
        return $this->belongsToMany(
            User::class, 'follows', 'follower_id', 'following_id'
        );
    }

    // follower user
    public function follower(){
        return $this->belongsToMany(
            User::class, 'follows', 'follower_id', 'following_id'
        );
    }

    // user nontification
    public function notifications(){
        return $this->hasMany(Notification::class);
    }
}
