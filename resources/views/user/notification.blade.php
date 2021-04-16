@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Notification</div>
                <div class="card-body text-center">
                    @foreach ($notifs as $notif)
                    <li>
                        <a href="/posts/{{$notif->post_id}}">
                            {{$notif->message}}
                        </a>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
