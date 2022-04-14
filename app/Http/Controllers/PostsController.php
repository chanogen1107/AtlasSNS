<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index(){

        $posts = Post::latest()->get();  // <--- 追加
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request) // <--- 色々変更
    {
        $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'post' => ['required', 'string', 'max:140'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
        Post::create([ // tweetテーブルに入れるよーっていう合図
            'user_id' => Auth::user()->id,
            // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'post' => $request->post, // ツイート内容
        ]);
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }


}
