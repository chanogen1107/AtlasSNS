@extends('layouts.login')

@section('content')

@foreach($followingImages as $followingImage)
                <div>
                <a href="/profile/{{$followingImage->id}}"><img src="{{ asset('storage/profiles/'.$followingImage->image) }}" ></a>
                </div>
@endforeach
@foreach($followingPosts as $followingPost)

                  <p>{{$followingPost->post}}</p>
                  <p>{{$followingPost->created_at}}</p>


@endforeach

@endsection