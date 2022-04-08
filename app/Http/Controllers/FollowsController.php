<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function show()
    {
        // $login_user = auth()->user();
        // $is_following = $login_user->isFollowing($user->id);
        // $is_followed = $login_user->isFollowed($user->id);
        // $follow_count = $follow->getFollowCount($user->id);
        // $follower_count = $follow->getFollowerCount($user->id);

        // return view('posts.index', [
        //     'user'           => $user,
        //     'is_following'   => $is_following,
        //     'is_followed'    => $is_followed,
        //     'follow_count'   => $follow_count,
        //     'follower_count' => $follower_count
        // ]);

        $follow_count='フォロー数';
        return view('posts.index')->with('follow_count',$follow_count);
    }
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }


}
