<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class AdminLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        } else{
            return $request->email;
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
    public function logout(Request $request){
     
        Auth::logout();
        Session::flush();
        return redirect()->intended(route('home'));
    }
}
