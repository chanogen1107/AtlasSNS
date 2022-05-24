@extends('layouts.login')

@section('content')

<form action="/search" method="get" >
  {{ csrf_field()}}
  {{method_field('get')}}
<div class =search>
  <div class =search-form>
    <input type="text" class="search-form-box" placeholder="ユーザー名" name="username">
    <button type="submit" class="btn search-button-deghin">検索</button>



@if(!empty($message))
    <div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif
</div>
</div>
</form>
@if(session('flash_message'))
<div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
@endif
<div style="margin-top:50px;">
<h1>ユーザー一覧</h1>
<!-- <table class="table"> -->

@foreach($users as $user)
  <!-- <tr> -->

  @if($user->id != Auth()->user()->id)
   <div class = search-list>
    <td><img src= "{{ asset('storage/images/'.$user->images) }}" class = "icon" ></td><td>{{$user->username}}</td>
  <!-- </tr> -->


  <!-- <tr> -->
<div class="search-list-btn">
@if (auth()->user()->isFollowing($user->id))
<form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
{{ csrf_field() }}
{{ method_field('DELETE') }}

<button type="submit" class="btn btn-danger">フォロー解除</button>
</form>
@else
<form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
  <!-- <input type=hidden name="id"> -->
{{ csrf_field() }}

<button type="submit" class="btn btn-primary">フォローする</button>
</form>
@endif
</div>

</div>
@endif
  <!-- </tr> -->
@endforeach

<!-- </table> -->
</div>


@endsection
