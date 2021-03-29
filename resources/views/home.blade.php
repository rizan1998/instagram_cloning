@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h2 class="ml-3" >User : {{$user->username}}</h2>
                <div class="card-body">
                    <img src="{{asset('images/avatar/' . $user->avatar)}}" alt="{{$user->username}}" width="50px">
                    fullname = {{$user->fullname}}
                    bio: {{$user->bio}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
