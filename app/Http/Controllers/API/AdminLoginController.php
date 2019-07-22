<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class AdminLoginController extends Controller
{
   public function register(Request $request){

    $validated = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required',
        'email' => 'email|required|unique:users',
        'password' => 'required|confirmed'
    ]);

    $user = Admin::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'middle_name' => $request['middle_name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password'])
    ]);

    $accessToken = $user->createToken('authToken')->accessToken;

    return response(['user' => $user, 'accessToken' => $accessToken]);
   }

   public function login(Request $request){
    
    $validated = $request->validate([
        'email' => 'email|required',
        'password' => 'required'
    ]);
        
   
    if(!Auth::guard('web')->attempt($validated)){
        return response(['message' => $request->password]);
    }

    $accessToken = auth()->user()->createtoken('authToken')->accessToken;

    return response(['user' => auth()->user(), 'access_token' => $accessToken]);
   }
}
