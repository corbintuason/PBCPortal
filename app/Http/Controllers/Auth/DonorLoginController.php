<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class DonorLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:donor');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validated = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($validated)){
            return redirect()->intended(route('home'));
        }
        $accessToken = auth()->user()->createtoken('authToken')->accessToken;

        $response = response(['user' => auth()->user(), 'access_token' => $accessToken]);
        return redirect()->intended(route('home'))->with('response', $response);
    }
    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect()->intended(route('home'));
    }
}
