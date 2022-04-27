<?php

namespace App\Http\Controllers;

use App\Post;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();
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

    public function edit(Request $request)
    {
        $validator = $request->validate([
            'post' => ['required', 'string', 'max:140'],
        ]);
          $id = $request->input('id');
          $up_post = $request->input('upPost');
          Post::query()
          ->where('id', $id)
          ->update(
            ['post' => $up_post]
          );

          return redirect('/top');
    }

    public function delete($id)
    {
        Post::query()
        ->where('id', $id)
        ->delete();

        return redirect('/top');
    }




}
