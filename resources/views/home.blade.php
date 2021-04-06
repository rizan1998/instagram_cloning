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
                        <x-post.card :post="$post" />
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
