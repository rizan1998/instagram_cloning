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
                        <form method="POST" action="/user/edit" enctype="multipart/form-data">
                            @csrf
                            @method('put');
        
                            <x-form.input label="Username" name="username" :object="$user" />
                            <x-form.input label="Fullname" name="fullname"  :object="$user"/>
                            <x-form.input label="Biodata" name="bio" :object="$user" />

                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">
                                    Foto profile
                                </label>
                                    <div class="col-md-6">
                                        <input type="file" name="avatar" id="avatar" >
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{$errors->first('avatar')}}
                                                </strong>
                                            </span>                                            
                                        @endif
                                    </div>
                            </div>
    
                            <x-btn.submitbtn text="Update Profile"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection