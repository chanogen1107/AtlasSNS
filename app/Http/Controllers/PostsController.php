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
            'post' => ['required', 'string', 'max:200'], 
            
            'post.required' => 'ツイート内容を入力してください',
            'post.string' => 'ツイートは文字で入力してください',
            'post.max' => 'ツイートは200文字以内で入力してください',
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
        $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'post' => ['required', 'string', 'max:200'], 
            
            'post.required' => 'ツイート内容を入力してください',
            'post.string' => 'ツイートは文字で入力してください',
            'post.max' => 'ツイートは200文字以内で入力してください',
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
