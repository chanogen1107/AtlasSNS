<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    //

    public function followList(){
        $id=Auth::user()->id;
        $followingImages = User::query()->whereIn('id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
        $followingPosts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
        return view('follows.followList')
        ->with([
            'followingImages' => $followingImages,
            'followingPosts' => $followingPosts,
          ]
        );
    }
    public function followerList(){
        $id=Auth::user()->id;
        $followerImages = User::query()->whereIn('id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        $followerPosts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        return view('follows.followerList')
        ->with([
            'followerImages' => $followerImages,
            'followerPosts' => $followerPosts,
          ]
        );
    }


}
