@extends('layouts.login')

@section('content')

<!-- @if(isset($id))
<p>$id</p>
@else
<p>メッセージは存在しません。</p>
@endif -->

<div class =tweet-form>
  <img src="images/arrow.png" class = tweet-icon>
  <form method="POST" action="/top" enctype="multipart/form-data">
      @csrf
      <input type = "text" placeholder = "ユーザー名"  name = post class = tweet-input>
      <input type = "image" src = "../images/post.png" alt = "送信する" class =tweet-button>
      <span class="focus_line"></span>
    @if($errors->first('post'))
    <p>※{{$errors->first('post')}}</p>
    @endif
  </form>
</div>

<!-- ツイート表示 -->
<div class="post-wrapper">
                @foreach($posts as $post)
                <div class=posts>
                    <div class=post-box>
                    <img src="{{ asset('storage/profiles/'.$post->image) }}">
                    <div post-content>
                      <div class=n-c-box>
                        <p class=post-name>{{ $post->User->username }}</p>
                        <p class=post-created_at>{{$post->created_at}}</p>
                      </div>
                        <p class=post-post>{{$post->post}}</p>
                      </div>
                    </div>

                  <div class=u-d-box>
                  <input type = "image" src = "../images/edit.png" post="{{ $post->post }}" post_id="{{ $post->id }}" alt = "編集" class =js-modal-open>
                  <a href = "/delete/{{$post->id}}"><input type = "image" src = "../images/trash-h.png" action="/delete/{{$post->id}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')" alt = "削除" class =post-trash></a>
                  </div>
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