<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');


Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ

Route::get('/top','PostsController@index')->middleware('auth');
Route::Post('/top', 'PostsController@store')->name('post-store');
Route::Post('/edit', 'PostsController@edit')->middleware('auth');
Route::get('/delete/{id}','PostsController@delete')->middleware('auth');



Route::get('/profile/{id}','UsersController@profile')->middleware('auth');
//プロフィール編集
Route::put('/profile', 'UsersController@profileUpdate')->middleware('auth');



Route::get('/search','UsersController@index')->middleware('auth');


Route::post('users/{id}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');
;

Route::get('/follow-list','FollowsController@followList')->middleware('auth');
;
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');
;

Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');
;
