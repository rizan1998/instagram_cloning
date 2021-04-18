@extends('layouts.app')

@section('content')
<div class="container" id="feedContainer" >
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Feed @isset($querySearch) "{{$querySearch}}"@endisset</div>
                <div class="card-body" id="post-wrapper" >
                    {{-- forelse jika posts tidak ada --}}
                    @forelse ($posts as $post)
                    <div>
                        <x-post.card :post="$post" />
                        <input type="hidden" class="post_time" value="{{strtotime($post->created_at)}}">
                        <br>
                    </div>
                    @empty
                    <p>Tidak ditemukan. </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/feed.js')}}" ></script>
@endsection
