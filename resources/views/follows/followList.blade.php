@extends('layouts.login')

@section('content')

<h1 class=list-title>follow List</h1>
@foreach($followingImages as $followingImage)
                <div class = list-icon>
                <a href="/profile/{{$followingImage->id}}"><img src="{{ asset('storage/images/'.$followingImage->images) }}" class = "icon"></a>
                </div>
@endforeach
@foreach($followingPosts as $followingPost)
<div class=posts>
        <div class=post-box>
        <img src="{{ asset('storage/images/'.$followingPost->User->images) }}" class = "icon">
            <div class=post-content>
                <div class=n-c-box>
                  <p class=post-name>{{$followingPost->User->username}}</p>
                  <p class=post-created_at>{{$followingPost->created_at}}</p>
                </div>
                <p class=post-post>{{$followingPost->post}}</p>
            </div>
        </div>
    </div>
@endforeach

@endsection