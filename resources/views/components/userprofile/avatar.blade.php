@php
    // if($user->avatar)
    //     $avatar_url = asset('images/avatar/' . $user->avatar);
    // else 
    //     $avatar_url =  "https://ui-avatars.com/api/?name=" . $user->username;

    $avatar_url = ($user->avatar) ?
    asset('images/avatar/'. $user->avatar) :
    "https://ui-avatars.com/api/?background=random&size=128&rounded=true&name=" . $user->username ;  

@endphp

<img src="{{$avatar_url}}" class="rounded-circle"  alt="{{$user->username}}" width="60px" height="60px" >