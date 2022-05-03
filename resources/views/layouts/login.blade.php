<!-- @if(isset($login_id))
    <p>{{$login_id}}</p>
@else
    <p>メッセージは存在しません。</p>
@endif -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/script.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
  <header>
    <div id = "head">
      <h1><a href="/top"><img class=top_head_logo src="images/atlas.png"></a>
      </h1>
      <ul class="menu">
        <li class="menu__item">
          <a class="menu__item__link js-menu__item__link" href="">
          {{ Auth::user()->username }}さん<img src="images/arrow.png"></a>
            <ul class="submenu">
              <li class="submenu__item">
                <a href="/top">HOME</a>
              </li>
              <li class="submenu__item">
                <a href="/profile/{{ Auth::user()->id }}">プロフィール編集</a>
              </li>
                <li class="submenu__item">
                    <a href="/logout">ログアウト</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
            <!-- <div id="ac-wrapper">
                <div id="ac-menu">
                    <p>〇〇さん<img src="images/arrow.png"></p>
                </div>
                <ul>
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div> -->
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>

                <div class=follow>
                <p class=lavel>フォロー数</p>
                <p class=count>{{ $follow_count }}名</p>
                </div>
                <p class="btn , f"><a href="/follow-list">フォローリスト</a></p>
                <div  class=follow>
                <p class=lavel>フォロワー数</p>
                <p class=count>{{ $follower_count }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>

</html>
