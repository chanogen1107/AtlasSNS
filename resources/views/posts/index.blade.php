@extends('layouts.login')

@section('content')

<!-- @if(isset($id))
<p>$id</p>
@else
<p>メッセージは存在しません。</p>
@endif -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../../../public/js/script.js"></script>

<div class = tweet>
<div class =tweet-form>
<img src="{{ asset('storage/images/'.Auth::user()->images) }}" class = icon>
  <form method="POST" action="/top" enctype="multipart/form-data" class = tweet-post-form>
      @csrf
      <input type = "text" placeholder = "投稿内容を入力してください"  name = post class = tweet-input>
      <input type = "image" src = "../images/post.png" alt = "送信する" class =tweet-button>
  </form>
</div>
@if($errors->first('post'))
    <p class = post-danger>※{{$errors->first('post')}}</p>
    @endif
</div>


<!-- ツイート表示 -->
<div class="post-wrapper">
                @foreach($posts as $post)
                <ul>
                  <li class = posts-list>
                    <div class = posts>
                    <figure><img src="{{ asset('storage/images/'.$post->User->images) }}" class = "icon"></figure>
                    <div class=post-content>
                        <div class=post-name>{{ $post->User->username }}</div>
                        <div class=post-post>{{$post->post}}</div>
                    </div>
                        <div class=post-created_at>{{$post->created_at}}</div>
                    </div>
                    <div class=u-d-box>
                    @if($post->user_id == Auth()->user()->id)
                    <div  class =post-update><input type = "image" src = "../images/edit.png" post="{{ $post->post }}" post_id="{{ $post->id }}" alt = "編集" class =js-modal-open ></div>
                    <a href = "/delete/{{$post->id}}" class =js-post-trash><input type = "image" src = "../images/trash-h.png"
                    action="/delete/{{$post->id}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"
                    alt = "削除" class =post-trash></a>
                  @endif
                </div>

              </li>
              </ul>

                @endforeach

                <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/edit" method="POST">
                <input type="hidden" name="id" class="modal_id" value="PUT">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type = "image" src = "../images/edit.png" action="/edit" class="modal_btn">
                <!-- <input type="submit" value="更新"> -->
                {{ csrf_field() }}
                @if($errors->first('upPost'))
    <p class = post-danger>※{{$errors->first('upPost')}}</p>
           </form>
    @endif
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
            </div>


@endsection