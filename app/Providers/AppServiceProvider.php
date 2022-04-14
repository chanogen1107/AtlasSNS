<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(User $user ,Follow $follow)
    {
        View::composer('layouts.login', function ($view) {
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


        $login_id=Auth::user()->id;
        $query = Follow::query();

        $follow_count=$query->where('following_id',$login_id)->count();
        $follower_count=$query->where('followed_id',$login_id)->count();
        $view->with([
        'follow_count'=>$follow_count,
        'follower_count'=>$follower_count,
        'login_id'=>$login_id,
        ]);
        // controllerから渡すときの感じです
    });
        //
    }
}
