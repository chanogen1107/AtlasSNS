@extends('layouts.login')

@section('content')

@foreach($followerImages as $followerImage)
                <div>
                <a href="/profile/{{$followerImage->id}}"><img src="{{ asset('storage/images/'.$followerImage->images) }}" class = "icon"></a>
                </div>
@endforeach
@foreach($followerPosts as $followerPost)
    <div class=posts>
        <div class=post-box>
        <img src="{{ asset('storage/images/'.$followerPost->User->images) }}" class = "icon">
            <div class=post-content>
                <div class=n-c-box>
                  <p class=post-name>{{$followerPost->User->username}}</p>
                  <p class=post-created_at>{{$followerPost->created_at}}</p>
                </div>
                <p class=post-post>{{$followerPost->post}}</p>
            </div>
        </div>
    </div>



@endforeach
@endsection