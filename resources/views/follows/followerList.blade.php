@extends('layouts.login')

@section('content')
<div class = list>
<h1 class=list-title>Follower List</h1>
@foreach($followerImages as $followerImage)
                <div>
                <a href="/profile/{{$followerImage->id}}"><img src="{{ asset('storage/images/'.$followerImage->images) }}" class = "icon"></a>
                </div>
@endforeach
</div>
<div class="post-wrapper">
                @foreach($followerPosts as $followerPost)
                <ul>
                  <li class = posts-list>
                    <div class = posts>
                    <figure><img src="{{ asset('storage/images/'.$followerPost->User->images) }}" class = "icon"></figure>
                    <div class=post-content>
                        <div class=post-name>{{$followerPost->User->username}}</div>
                        <div class=post-post>{{$followerPost->post}}</div>
                    </div>
                        <div class=post-created_at>{{$followerPost->created_at}}</div>
                    </div>
                    </li>
                </ul>
                @endforeach
</div>
@endsection