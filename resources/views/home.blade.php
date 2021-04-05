@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h3>Feed @isset($querySearch) "{{$querySearch}}"@endisset</h3>

                    {{-- forelse jika posts tidak ada --}}
                    @forelse ($posts as $post)
                    <li class="mb-3" >
                        <img src="{{asset('images/posts/'.$post->image)}}" width="200" height="200" alt="{{$post->image}}" ondblclick="like({{$post->id}})">
                        <p class='captions' >{{$post->caption}}</p>
                        <a href="{{'@'.$post->user->username}}">{{'@'.$post->user->username}}</a>
                        
                        @if (Auth::check())    
                        <button class="btn btn-primary btn-sm"  onclick="like({{$post->id}})" id="post-btn-{{$post->id}}" >
                            {{ ($post->is_liked() ? 'unlike' : 'like')}}
                        </button>
                        @endif

                    <script>
                        // finding hastag
                        document.querySelectorAll(".captions").forEach(function(el){ //select all class .caption
                            let renderedText = el.innerHTML.replace(/#(\w+)/g, "<a href='/search?query=%23$1'>#$1</a>");
                            //ambil isinya lalu semua yang ada # diganti dengan sebuah link yang link tersebut masuk kedalam
                            // sistem pencariannya %23 adalah hastag(#) yang ramah url dan $1 adalah hasil dari pencarian
                            //jadi yang dipakai diatas namanya adalh regular expresion, jika menemukan hastag $1 diganti dengan
                            // semua kata hastagnya
                            el.innerHTML = renderedText //dan ganti element yang di loop tadi
                        });


                        // like tombol
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
                    @empty
                    <p>Tidak ditemukan. </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
