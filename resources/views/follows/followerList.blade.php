@extends('layouts.login')

@section('content')

@foreach($followerImages as $followerImage)
                <div>
                <img src="{{ asset('storage/profiles/'.$followerImage->image) }}" alt="プロフィール画像">
                </div>
@endforeach
@foreach($followerPosts as $followerPost)

                  <p>{{$followerPost->post}}</p>
                  <p>{{$followerPost->created_at}}</p>


@endforeach
@endsection