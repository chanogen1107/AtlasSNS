@extends('layouts.login')

@section('content')
<div class = list>
<h1 class=list-title>Follow List</h1>
@foreach($followingImages as $followingImage)
                <div class = list-icon>
                <a href="/profile/{{$followingImage->id}}"><img src="{{ asset('storage/images/'.$followingImage->images) }}" class = "icon"></a>
                </div>
@endforeach
</div>
<div class="post-wrapper">
                @foreach($followingPosts as $followingPost)
                <ul>
                  <li class = posts-list>
                    <div class = posts>
                    <figure><img src="{{ asset('storage/images/'.$followingPost->User->images) }}" class = "icon"></figure>
                    <div class=post-content>
                        <div class=post-name>{{$followingPost->User->username}}</div>
                        <div class=post-post>{{$followingPost->post}}</div>
                    </div>
                        <div class=post-created_at>{{$followingPost->created_at}}</div>
                    </div>
                    </li>
                </ul>
                @endforeach
</div>


@endsection