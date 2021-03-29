@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Foto</div>
                <div class="card-body">
                    <form action="/posts" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">
                            Image
                        </label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image" >
                                {{-- @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{$errors->first('image')}}
                                        </strong>
                                    </span>                                            
                                @endif --}}
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <x-form.textarea name="caption" label="Your Caption" />
                        <button type="submit" class="btn btn-primary  btn-block">Post!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
