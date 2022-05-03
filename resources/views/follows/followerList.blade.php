@extends('layouts.login')

@section('content')

@foreach($followerImages as $followerImage)
                <div>
                <a href="/profile/{{$followerImage->id}}"><img src="{{ asset('storage/profiles/'.$followerImage->image) }}"></a>
                </div>
@endforeach
@foreach($followerPosts as $followerPost)

                  <p>{{$followerPost->post}}</p>
                  <p>{{$followerPost->created_at}}</p>


@endforeach
@endsection