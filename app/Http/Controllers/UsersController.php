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

public function profileUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed|regex:/\A([a-zA-Z0-9]{8,})+\z/u',
            'password_confirmation' =>'required|regex:/\A([a-zA-Z0-9]{8,})+\z/u',
            'bio' =>'max:150',
            'images' =>'regex:._/\A([a-zA-Z0-9]{8,})+\z/u'
        ]);
            $user = Auth::user();
            $user->username = $request->input('name');
            $user->mail = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->bio = $request->input('bio');


            $user->save();

        return redirect('/top');
    }

// ファイルを保存するための処理
    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize();
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
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
