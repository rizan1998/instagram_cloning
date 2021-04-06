<div class="mb-3" >
    <img src="{{asset('images/posts/'.$post->image)}}" width="200" height="200" alt="{{$post->image}}" ondblclick="like({{$post->id}})">
    <p class='captions' >{{$post->caption}}</p>
    <a href="{{'@'.$post->user->username}}">{{'@'.$post->user->username}}</a>
    
    @if (Auth::check())    
    <button class="btn btn-primary btn-sm"  onclick="like({{$post->id}})" id="post-btn-{{$post->id}}" >
        {{ ($post->is_liked() ? 'unlike' : 'like')}}
    </button>
    <a href="/posts/{{$post->id}}" class="btn btn-sm btn-primary">Komentar</a>
    @endif

</div>