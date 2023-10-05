<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    
    public function __construct() {

        

    }

    public function login() {

        return view('admin.auth.login');

    }

    public function post_login(Request $request) {

        if (Auth::guard('admin')->check()) {

            return redirect()->route('admin.dashboard');

        }

        if ($request->isMethod('post')) {

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $messages = [
                'email.required' => 'Email Address is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules, $messages);

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect()->route('admin.dashboard');

            } else {

                return redirect()->back()->withInput($request->only('email'))->withError('Credentials not match!');

            }

        }
            
    }

    public function logout() {

        Auth::guard('admin')->logout();        
        
        return redirect()->route('admin.login');

    }

}
