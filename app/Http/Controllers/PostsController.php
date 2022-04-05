<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        // $timelines = Post::all();
        return view('posts.index');
        // ->with('posts', $timelines);;
        //タイムラインが未定義と言われる。送れてない？
    }



}
