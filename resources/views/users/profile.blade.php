@extends('layouts.login')

@section('content')

<img src="{{ asset('storage/profiles/'.$username->images) }}" alt="プロフィール画像">
<p>{{$username -> username}}さん</p>
<p>{{$username -> bio}}</p>
<div class="d-flex justify-content-end flex-grow-1">
@if (auth()->user()->isFollowing($username->id))
<form action="{{ route('unfollow', ['id' => $username->id]) }}" method="POST">
{{ csrf_field() }}
{{ method_field('DELETE') }}

<button type="submit" class="btn btn-danger">フォロー解除</button>
</form>
@else
<form action="{{ route('follow', ['id' => $username->id]) }}" method="POST">
  <!-- <input type=hidden name="id"> -->
{{ csrf_field() }}

<button type="submit" class="btn btn-primary">フォローする</button>
</form>
@endif
</div>

@foreach($posts as $post)
                <div class=posts>
                    <div class=post-box>
                        <img src="{{ asset('storage/profiles/'.$post->image) }}">
                        <div post-content>
                            <div class=n-c-box>
                                <p class=post-name>{{ $post->User->username }}</p>
                                <p class=post-created_at>{{$post->created_at}}</p>
                            </div>
                            <p class=post-post>{{$post->post}}</p>
                        </div>
                    </div>
                </div>
@endforeach
@endsection