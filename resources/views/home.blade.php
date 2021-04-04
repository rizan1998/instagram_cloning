@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    
                    @foreach ($posts as $post)
                    <li class="mb-3" >
                        <img src="{{asset('images/posts/'.$post->image)}}" width="200" height="200" alt="{{$post->image}}" ondblclick="like({{$post->id}})">
                        <a href="{{'@'.$post->user->username}}">{{'@'.$post->user->username}}</a>

                        <button class="btn btn-primary btn-sm"  onclick="like({{$post->id}})" id="post-btn-{{$post->id}}" >
                            {{ ($post->is_liked() ? 'unlike' : 'like')}}
                        </button>

                    <script>
                        function like(id){
                            const el =  document.getElementById('post-btn-' + id)
                            fetch('/like/' + id)    
                                .then(response => response.json())
                                // .then(data => console.log(data.status));
                                .then(data => {
                                    console.log(data.status)
                                    el.innerText = (data.status == 'LIKE') ? 'unlike':'like' ;
                                });
                        }
                    </script>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
