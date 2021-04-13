<div class="mb-3" >
    <img src="{{asset('images/posts/'.$post->image)}}" width="100%" height="auto" alt="{{$post->image}}" ondblclick="like({{$post->id}})">
    <p class="mb-0">
        <a href="{{'@'.$post->user->username}}">{{'@'.$post->user->username}}</a>
        <span class='captions' >
            {{$post->caption}}
        </span>
    </p> 
    <p>
        <small>
            {{$post->created_at->diffForHumans()}}
        </small>
    </p>
    
    @if (Auth::check())
    <span class="total_like" id="post-likescount-{{$post->id}}" >{{$post->likes_count}}</span>   
    <a class="text-dark"  onclick="like({{$post->id}}, 'POST', 'post')" id="post-btn-{{$post->id}}" >
        {{ ($post->is_liked() ? 'unlike' : 'like')}}
    </a>
    <a href="/posts/{{$post->id}}" class="text-dark">Komentar</a>
    @endif

</div>