@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{'@'.$user->username}}</div>
                <div class="card-body text-center">
                    <div>
                        <x-userprofile.avatar :user="$user" />
                    </div>
                    <div class="mt-1" >
                        <strong>{{$user->fullname}}</strong> 
                    </div>
                    <div>
                        {{$user->bio}}
                    </div>
                    <p>Following: {{$user->following->count()}}</p>
                    <p>Follower: {{$user->follower->count()}}</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::check())
                        @if(Auth::user()->id == $user->id)
                            <a class="mb-3" href="/user/edit">Edit Profile</a>
                        @else
                            <button class="btn btn-primary btn-sm mb-3"  onclick="follow({{$user->id}}, this)">
                                {{ (Auth::user()->following->contains($user->id) ? 'unfollow' : 'follow')}}
                            </button>
                        @endif
                    @endif
                

                    <script>
                        function follow(id, el){
                            fetch('/follow/' + id)
                                .then(response => response.json())
                                // .then(data => console.log(data.status));
                                .then(data => {
                                    el.innerText = (data.status == 'FOLLOW') ? 'unfollow':'follow' ;
                                });
                        }
                    </script>

                    @foreach ($user->posts as $post)
                    <div>
                        <a href="/posts/{{$post->id}}">
                        <img src="{{asset('images/posts/'.$post->image)}}" width="100%" height="auto" alt="{{$post->image}}">
                        </a>
                        <br>
                        @if (Auth::check())
                            @if (Auth::user()->id == $user->id)
                                <a href="/posts/{{$post->id}}/edit">Edit</a>
                            @endif
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
