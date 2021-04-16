<div class="mb-3" >
    <p>
        <x-userprofile.avatar :user="$post->user" size="32" />
        <a href="{{'@'.$post->user->username}}">{{'@'.$post->user->username}}</a>  
    </p>
      
    <img src="{{asset('images/posts/'.$post->image)}}" width="100%" height="auto" alt="{{$post->image}}" ondblclick="like({{$post->id}}, 'POST', 'post')">
    <p class="mb-0">
       
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
        @isset($isShow)
        @else
            <a href="/posts/{{$post->id}}" class="text-dark">Komentar</a>
        @endisset
    @endif
    <hr>

</div>