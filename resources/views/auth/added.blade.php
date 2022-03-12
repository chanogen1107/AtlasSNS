@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="welcome-name">
  <p>
    {{ Session::get('username') }}さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="welcome-message">
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>
</div>
<div class="login-btn">
  <p class = "btn-text"><a href="/login" class="btn">ログイン画面へ</a></p>
  </div>
</div>

@endsection
