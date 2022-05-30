@extends('layouts.login')

@section('content')
<div class =search>
<div class =search-form>
  @csrf
  <form action="/search" method="get" class="search-form-box">
    <div class="search-input-b"><input type="text"  placeholder="ユーザー名" name="username" class="search-input"></div>
    <div class="search-button-b"><button type="submit" class="btn search-button"><span class = search-button-icon></span></button></div>
@if(!empty($message))
    <div class="search-primary" role="alert">{{ $message}}</div>
@endif
 </form>
</div>
</div>
@if(session('flash_message'))
<div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
@endif
<div style="margin-top:50px;">
<!-- <table class="table"> -->

@foreach($users as $user)
  <!-- <tr> -->

  @if($user->id != Auth()->user()->id)
  <ul>
    <li class = search-list>
      <div class = search-box>
        <figure class = search-icon><img src= "{{ asset('storage/images/'.$user->images) }}" class = "icon" ></figure>
        <div class = search-name>{{$user->username}}</div>
        <div class="search-follow-btn">
        @if (auth()->user()->isFollowing($user->id))
          <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
        @else
          <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
        @endif
       </div>
    </div>
  </li>
</ul>
@endif
  <!-- </tr> -->
@endforeach

<!-- </table> -->
</div>


@endsection
