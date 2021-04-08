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

                    <form action="/post/{{$post->id}}/comment" method="post" >
                        @csrf
                        <x-form.textarea name="body" label="Komentar" />
                        <button type="submit" class="btn btn-primary  btn-block">Post Komentar</button>
                    </form>
                    @foreach ($post->comments as $comment)
                            <p>{{$comment->body}} - 
                                <a href="/{{'@'.$comment->user->username}}">
                                    {{'@'.$comment->user->username}}
                                </a>
                                @if (Auth::user()->id == $comment->user_id)
                                    <a href="/comment/{{$comment->id}}/edit">Edit</a>
                                    <a class="color-primary" 
                                    onclick="event.preventDefault();
                                                  document.getElementById('hapuskomentar').submit();">
                                    Hapus
                                    </a>
                                    <form id="hapuskomentar" action="/comment/{{$comment->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                                <button class="btn btn-primary btn-sm"  onclick="like({{$comment->id}} , 'COMMENT', 'comment')" id="comment-btn-{{$comment->id}}" >
                                    {{ ($comment->is_liked() ? 'unlike' : 'like')}}
                                </button>
                            </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/feed.js')}}" ></script>
@endsection
