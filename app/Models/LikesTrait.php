<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;


trait LikesTrait{

    public function likes(){
        return $this->morphMany('App\Models\Like', 'likeable');
    }
    public function is_liked(){
        // like disini mengacu pada function yang sebelumnya ditulis
        // count() akan menghasilkan return true
        return $this->likes->where('user_id', Auth::user()->id )->count();
    }

}

