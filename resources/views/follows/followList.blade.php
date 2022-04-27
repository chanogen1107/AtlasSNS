@extends('layouts.login')

@section('content')

@foreach($followingImages as $followingImage)
                <div>
                <img src="{{ asset('storage/profiles/'.$followingImage->image) }}" alt="プロフィール画像">
                </div>
@endforeach
@foreach($followingPosts as $followingPost)

                  <p>{{$followingPost->post}}</p>
                  <p>{{$followingPost->created_at}}</p>


@endforeach

@endsection