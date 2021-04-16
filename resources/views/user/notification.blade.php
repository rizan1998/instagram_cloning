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
                        <a href="/posts/{{$notif->post_id}}" class="{{($notif->seen)? 'text-dark' : ''}}" >
                            {{$notif->message}}
                        </a>
                    </li>
                    @endforeach
                    {{$notifs->links()}}
                </div>
                <script>
                    // update seen ketika mengunjungi atau reload telah terbaca semua
                    fetch('/notification/seen')
                    .then(Response => Response.json)
                    .catch(error => console.log(error))
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
