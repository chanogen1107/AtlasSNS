@extends('layouts.login')

@section('content')

<form action="{{ url('search-end')}}" method="post">
  {{ csrf_field()}}
  {{method_field('get')}}
<div class =search>
<div class =search-form>
    <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="username">
      <!-- {{ Form::label('') }}
      {{ Form::text('search',null,['class' => 'search-input']) }} -->
    </div>
     <div class =search-button>
         <button type="submit" class="btn btn-primary col-md-5">検索</button>


  <!-- {{ Form::submit('',['class' => 'button']) }} -->
</div>
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif
</div>
</form>
@if(session('flash_message'))
<div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
@endif
<div style="margin-top:50px;">
<h1>ユーザー一覧</h1>
<table class="table">

@foreach($users as $user)
  <tr>
    <td><img src= {{$user->images}} ></td><td>{{$user->username}}</td>

    <!-- <td>{{ Form::submit('フォローする',['class' => 'button']) }}</td><td>{{ Form::submit('フォローを外す',['class' => 'button']) }}</td> -->

<div class="d-flex justify-content-end flex-grow-1">
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


  </tr>
@endforeach
</table>
</div>

</div>

@endsection
