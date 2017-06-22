<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';
//    protected $k'/';

    protected $redirectAfterLogout = '/';
    protected $username='username';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'username'=>'required|min:5|unique:users',
//            'password'=>'required|confirmed|min:6',
//            'usergroup'=>'required'
//            'description'=>'required',
        ],[
//            'username.required' =>'กรุณากรอก Username',
//            'username.min'=>'ใส่ข้อมูลอย่างน้อย 5 ตัว',
//            'username.unique'=>'username นี้มีการใช้งานแล้ว',
//            'password.required'=>'กรุณากรอกรหัสผ่าน',
//            'password.confirmed'=>'รหัสผ่านไม่เหมือนกัน',
//            'usergroup.required'=>'กรุณาเลือกกลุ่มผู้ดูแลระบบ'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

    }

    public function login(Request $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
//
            return redirect()->route('dashboard.index');
        }
        $errors=new MessageBag([
               'password'=>'username หรือ password ไม่ถูกต้อง'
            ]);
//
        return redirect('/')->withErrors($errors);
    }

//    public function logout(){
//        if(!isset($_SESSION))
//        {
//            session_start();
//        }
//        Auth::logout();
//        session_destroy();
//
//        return redirect('/');
//    }



}


