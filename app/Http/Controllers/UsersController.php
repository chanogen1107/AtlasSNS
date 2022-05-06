<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function profile($id) {
    $user = Auth::user();
    $username = User::find($id);
    $posts = Post::query()->where('user_id', $id)->latest()->get();
    return view('users.profile')
    ->with(
      ['username' => $username,
      'user' => $user,
      'posts' => $posts]
    );
}

 public function show(){
        $auths = Auth::user();
        return view('posts.index')->with('auths',$auths);
    }


    // public function index() {

    //     $users = User::all();
    //     return view('users.search')->with('users', $users);
    //   }

    public function index(Request $request) {

      $keyword_name = $request->input('username');
      // dd($keyword_name);
      $query = User::query();

      if(!empty($keyword_name)) {

        $users = $query->where('username','like', '%' .$keyword_name. '%')->get();
        $message = "検索ワード：". $keyword_name."";

        return view('users.search')
        ->with([
          'users' => $users,
          'message' => $message,
        ]
      );
         }else if(empty($users)){

          $users = User::all();
          // $message = "検索結果はありません。";
          return view('users.search')->with([
            'users' => $users,
            // 'message' => $message,
          ]
        );
         }else{
          $users = User::all();
          return view('users.search')->with('users', $users);
         }

    }


    public function search(Request $request){
        $keyword_name = $request->username;
        // dd($keyword_name);
//カラム（列）がないよってよ=nameじゃなくてusernameだった。
        if(!empty($keyword_name)) {
      // $query = User::query();
      $users = User::query()->where('username','like', '%' .$keyword_name. '%')->get();
      // dd($users);
      $message = "検索ワード：". $keyword_name."";
      dd($message);
      //viewが見当たらねえってよ=users.入れてないからだった
      return redirect('/search')
      ->with([
        'users' => $users,
        'message' => $message,
      ]
    );

    } else {
      $users = User::all();
      // return view('users.search')->with('users', $users);
      $message = "検索結果はありません。";
      // dd($message);
      // return view('users.search-end')->with('message',$message);
      return back()
      ->with([
        'users' => $users,
        'message' => $message,
      ]);}
    }

    // フォロー
    public function follow(User $user, $id)
    {
      $user = User::find($id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user,$id)
    {
      $user = User::find($id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }

    }



}
