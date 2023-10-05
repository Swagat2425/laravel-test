<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class FrontendController extends Controller
{
    
    public function __construct() {

    }

    public function signup() {

        return view('front.auth.signup');

    }

    public function post_signup(Request $request) {

        $validator = $this->validate_signup($request);

        if ($validator->passes()) {

            $uname = (isset($request->uname)) ? trim($request->uname) : '';
            $email = (isset($request->email)) ? trim($request->email) : '';
            $pwd = (isset($request->pwd)) ? trim($request->pwd) : '';
            $cpwd = (isset($request->cpwd)) ? trim($request->cpwd) : '';

            if ($pwd != $cpwd) {
                $validator->getMessageBag()->add('cpwd', 'Please enter same password');
                return back()->withInput($request->all())->withErrors($validator->errors());
            }

            $now_date = date('Y-m-d H:i:s');

            $user = new User();
            $user->name = $uname;
            $user->email = $email;
            $user->password = Hash::make($pwd);
            $user->status = 1;
            $user->crt_on = $now_date;
            $user->updt_on = $now_date;
            
            if($user->save()){
                return back()->withSuccess('Registered successfully! Please click here to <a href="'. route('login') .'">login</a>.');
            }else{
                return back()->withError('Something went wrong! Please try again.');
            }

        }

        return back()->withInput($request->all())->withErrors($validator->errors());

    }

    public function validate_signup(Request $request) {

        return Validator::make($request->all(), [
            'uname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'pwd' => 'required|string|min:8',
            'cpwd' => 'required|string',
        ],
        [
            'uname.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'email.unique' => 'Email used already!',
            'pwd.required' => 'Please enter password',
            'pwd.min' => 'Password must be at least 8 of characters',
            'cpwd.required' => 'Please enter confirm password',
        ]);

    }

    public function login() {

        return view('front.auth.login');

    }

    public function post_login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
    
        if ($validator->passes()) {

            if (Auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
              
                return redirect()->route('home');
                
            } else {
                
                return back()->withInput($request->only('email', 'remember'))->withError('Credentials not matched');

            }

        }

        return back()->withInput($request->only('email', 'remember'))->withErrors($validator->errors());

    }

    public function logout(Request $request) {
       
        Auth()->logout();
        // redirect to login
        $request->session()->invalidate();
        Session::flush();
        return redirect('/');

    }

}
