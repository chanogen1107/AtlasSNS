@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class=login-text>AtlasSNSへようこそ</p>
@csrf
<div class =form>
    <div class =form-wrapper>
      {{ Form::label('mail addless') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class =form-wrapper>
      {{ Form::label('password') }}
      {{ Form::password('password',['class' => 'input']) }}
    </div>
    <div class =form-button>
  {{ Form::submit('Login',['class' => 'button']) }}
</div>
<p class=login-text-s><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
