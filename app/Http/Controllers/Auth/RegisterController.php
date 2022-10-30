<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function validator(array $data)
    {
        return Validator::make($data,
        [
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|min:5|max:40|unique:users',
            'password' => 'required|min:8|max:20|confirmed|string|regex:/\A([a-zA-Z0-9]{8,})+\z/u',
                
        ],
        [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '有効なEメールアドレスを入力してください',
            'mail.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'mail.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'mail.unique:users' => 'このメールアドレスは既に使われています',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上、20文字以下で入力してください',
            'password.max' => 'パスワードは8文字以上、20文字以下で入力してください',
            'password.confirmed' => '確認パスワードが一致していません',
            'password_confirmation.required' => '確認パスワードを入力してください',
            'password.regex' => 'パスワードは半角英数字で入力してください',
            


// 半角英数字NGのやり方。
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),

        ]);
//       $request->validate([
// 	     'username' => 'required|unique:posts',
// 	     'mail' => 'required',
//          'password' => bcrypt('required'),
// 　　　　]);


    }

public function store(Request $request)
{
}
    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $validator = $this->validator($data);
            if ($validator->fails()) {
                 return redirect('/register')
                ->withErrors($validator)
                ->withInput();
            }

            $this->create($data);
            return redirect('added')->with('username', $data['username']);
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
