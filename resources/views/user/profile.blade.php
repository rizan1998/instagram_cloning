@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'@'.$user->username}}</div>
                <div class="card-body">
                    <div>
                        <x-userprofile.avatar :user="$user" />
                    </div>
                    <div class="mt-1" >
                        <strong>{{$user->fullname}}</strong> 
                    </div>
                    <div>
                        {{$user->bio}}
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($user->posts as $post)
                    <li>
                        <img src="{{asset('images/posts/'.$post->image)}}" width="200" height="200" alt="{{$post->image}}">
                        @if (Auth::user()->id == $user->id)
                            <a href="/posts/{{$post->id}}/edit">Edit</a>
                        @endif
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
