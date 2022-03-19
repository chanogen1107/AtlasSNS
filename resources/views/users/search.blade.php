@extends('layouts.login')

@section('content')

<div class =search>
<div class =search-form>
      {{ Form::label('') }}
      {{ Form::text('search',null,['class' => 'search-input']) }}
    </div>
     <div class =search-button>
  {{ Form::submit('',['class' => 'button']) }}
</div>
</div>
</form>
@if(session('flash_message'))
<div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
@endif
<div style="margin-top:50px;">
<h1>ユーザー一覧</h1>
<table class="table">
  <tr>
    <th>ユーザー名</th><th>年齢</th><th>性別</th>
  </tr>
@foreach($users as $user)
  <tr>
    <td><img src= {{$user->images}} ></td><td>{{$user->username}}</td><td>{{ Form::submit('follow',['class' => 'button']) }}</td>
  </tr>
@endforeach
</table>
</div>


@endsection