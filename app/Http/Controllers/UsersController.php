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

// モデル名イズ何

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}
