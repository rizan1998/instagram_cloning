@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <x-form.input label="Username" name="username" />
                        <x-form.input label="E-Mail Address" name="email" type="email"/>
                        <x-form.input label="Password" name="password" type="password"/>
                        <x-form.input label="Confirm Password" name="password_confirmation" type="password"/>
                        <x-btn.submitbtn text="Daftar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
