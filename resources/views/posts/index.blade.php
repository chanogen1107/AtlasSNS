@extends('layouts.login')

@section('content')

@if(isset($id))
<p>$id</p>
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
     <input type="image" src="../images/post.png" alt="送信する" height="25%">
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
                  <label class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}">編集</label>
                  <a href="/delete/{{$post->id}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
                </div>
                @endforeach

                <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/edit" method="POST">
                <input type="hidden" name="id" class="modal_id" value="PUT">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
            </div>


@endsection