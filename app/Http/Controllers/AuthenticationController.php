<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginForm()
    {
        return view('backend.login');
    }

    public function doLogin(Request $request)
    {
          // $credentials=$request->only(['email','password']);
        // $credentials=['email'=>$request->user_email,'password'=>$request->user_password];

        $credentials=$request->except("_token");
        //dd($credentials);

        $check=Auth::attempt($credentials);
        //dd($check);
        if($check)
        {
            notify()->success("login successful");
            return redirect()->route('dashboard');
        }else{
            //user info wrong
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        notify()->success("Logout Successful");
        return redirect()->route('login');

    }
}
