@extends('layouts.login')

@section('content')

<form action="{{ url('search-end')}}" method="post">
  {{ csrf_field()}}
  {{method_field('get')}}
<div class =search>
<div class =search-form>
   <label>名前</label>
    <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="username">
      <!-- {{ Form::label('') }}
      {{ Form::text('search',null,['class' => 'search-input']) }} -->
    </div>
     <div class =search-button>
         <button type="submit" class="btn btn-primary col-md-5">検索</button>
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif

  <!-- {{ Form::submit('',['class' => 'button']) }} -->
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

</div>

@endsection
