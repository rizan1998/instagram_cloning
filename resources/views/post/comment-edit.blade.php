@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Komentar</div>
                <div class="card-body">
                    <form action="/comment/{{$comment->id}}" method="post" >
                        @csrf
                        @method('put')
                        <x-form.textarea name="body" label="komentar kamu" :object="$comment" />
                        <button type="submit" class="btn btn-primary  btn-block">Ubah Komentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
