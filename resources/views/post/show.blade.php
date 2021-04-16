@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
               
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col ">
                            <x-post.card :post="$post" isShow="true"  />
                        </div>
                    </div>

                    <form action="/{{$post->id}}/comment" method="post" >
                        @csrf
                        <x-form.textarea-simple :object="$post" name="body"/>
                        <button type="submit" class="btn btn-primary  btn-block">Post Komentar</button>
                    </form>
                    @foreach ($post->comments as $comment)
                            <p class="mb-0" >
                                <a href="/{{'@'.$comment->user->username}}">
                                    {{'@'.$comment->user->username}}
                                </a> - {{$comment->body}}
                                <span class="total_likes" id="comment-likescount-{{$comment->id}}">{{$comment->likes_count}}</span>
                                <a class="text-dark"  onclick="like({{$comment->id}} , 'COMMENT', 'comment')" id="comment-btn-{{$comment->id}}" >
                                    {{ ($comment->is_liked() ? 'unlike' : 'like')}}-
                                </a>
                                @if (Auth::user()->id == $comment->user_id)
                                    <a class="text-dark" href="/comment/{{$comment->id}}/edit">Edit-</a>
                                    <a class="text-dark" 
                                    onclick="event.preventDefault();
                                                  document.getElementById('hapuskomentar').submit();">
                                    Hapus
                                    </a>
                                    <form id="hapuskomentar" action="/comment/{{$comment->id}}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/feed.js')}}" ></script>
@endsection
