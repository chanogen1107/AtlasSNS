@extends('layouts.login')

@section('content')

@if(isset($post))
<p>$post</p>
@else
<p>メッセージは存在しません。</p>
@endif

<div class =tweet>
<img src="images/arrow.png">
<div class =tweet-form>
<form method="POST" action="/top" enctype="multipart/form-data">
@csrf
      {{ Form::text('post',null,['class' => 'tweet-input']) }}
    </div>
     <div class =tweet-button>
  {{ Form::submit('投稿',['class' => 'button']) }}
</div>
@if($errors->first('post'))
  <p>※{{$errors->first('post')}}</p>
@endif
</form>
</div>

<!-- ツイート表示 -->
<div class="post-wrapper">
                @foreach($posts as $post)
                <div>
                  <p>{{$post->user_id}}</p>
                  <p>{{$post->post}}</p>
                  <p>{{$post->created_at}}</p>
                  <a href="/top">編集</a>
                  <a href="/top">削除</a>
                </div>
                @endforeach
            </div>


@endsection