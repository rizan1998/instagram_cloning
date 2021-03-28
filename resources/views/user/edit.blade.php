@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update Profile <strong>{{$user->username}}</strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/user/update">
                            @csrf
        
                            <x-form.input label="Username" name="username" :object="$user" />
                            <x-form.input label="E-Mail Address" name="email" type="email" :object="$user"/>
                            <x-form.input label="Biodata" name="bio" :object="$user" />
                            <p>
                                todo:avatar
                            </p>
    
                            <x-btn.submitbtn text="Update Profile"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection