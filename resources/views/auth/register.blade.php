@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2 class = register-text>新規ユーザー登録</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
           @endforeach
        </ul>
    </div>
@endif

<div class =form-wrapper>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input'])}}
</div>
<div class =form-wrapper>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class =form-wrapper>
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input'])  }}
</div>
<div class =form-wrapper>
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
</div>
<div class =form-button>
{{ Form::submit('登録',['class' => 'button']) }}
</div>
<p class = register-text-s><a href="/login" class=text>ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
