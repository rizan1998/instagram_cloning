@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show</div>
                <div class="card-body">
                    <div class="form-group row justify-content-center">
                        <div class="col text-center">
                            <x-post.card :post="$post"  />
                        </div>
                    </div>

                    <form action="/comment/{{$post->id}}" method="post" >
                        @csrf
                        <x-form.textarea name="body" label="Komentar" />
                        <button type="submit" class="btn btn-primary  btn-block">Post Komentar</button>
                    </form>
                    @foreach ($post->comments as $comment)
                            <p>{{$comment->body}} - 
                                <a href="/{{'@'.$comment->user->username}}">
                                    {{'@'.$comment->user->username}}
                                </a>
                            </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/feed.js')}}" ></script>
@endsection
