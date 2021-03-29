@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div>
                        <x-userprofile.avatar :user="$user" />
                         <b class="ml-1" >{{$user->username}}</b> 
                    </div>
                    <div class="mt-1" >
                        fullname = {{$user->fullname}}
                    </div>
                    <div>
                        bio: {{$user->bio}}
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div >
                        <a href="/posts/create">Upload Foto</a>
                    </div>
                    @foreach ($user->posts as $post)
                        {{$post->caption}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
