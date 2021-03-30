@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Caption</div>
                <div class="card-body">
                    <form action="/posts/{{$post->id}}" method="post" >
                        @csrf
                        @method('put')
                        <div class="form-group row justify-content-center">
                            <div class="col text-center">
                                <img src="{{asset('images/posts/'.$post->image)}}" width="200" height="200" alt="{{$post->image}}">
                            </div>
                        </div>
                        <x-form.textarea name="caption" label="Your Caption" :object="$post" />
                        <button type="submit" class="btn btn-primary  btn-block">Post!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
