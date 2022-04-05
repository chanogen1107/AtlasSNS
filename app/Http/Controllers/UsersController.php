<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function index() {

        $users = User::all();
        return view('users.search')->with('users', $users);
      }

    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        $keyword_name = $request->username;
//カラム（列）がないよってよ=nameじゃなくてusernameだった。
        if(!empty($keyword_name)) {
      $query = User::query();
      $users = $query->where('username','like', '%' .$keyword_name. '%')->get();
      $message = "検索ワード：". $keyword_name."";
      //viewが見当たらねえってよ=users.入れてないからだった
      return view('users.search-end')
      ->with([
        'users' => $users,
        'message' => $message,
      ]
    );

    } else {
      $message = "検索結果はありません。";
      return view('users.search-end')->with('message',$message);
      }
    }

    // フォロー
    public function follow(User $user,$id)
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
