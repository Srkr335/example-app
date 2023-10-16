<?php

namespace App\Http\Controllers;


class LoginController 
{
    public function login(){
        return view('login');
    }
    public function dologin(){
        $input=['email'=>request('email'),'password'=>request('password')];
     if(auth()->attempt($input,true)){
        return redirect()->route('home');
     }else{
        return redirect()->route('login')->with('message','Login is Invalid');
     }
     } 
     public function logout(){
        auth()->logout();
        return redirect()->route('login');

     }
    
}
