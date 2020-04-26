<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function entrar(Request $request){
        $loginUser = $request->only('email', 'password');

        if(Auth::attempt($loginUser)){
            return redirect()->route('home');
        }else{
            return redirect()->route('site.login.index');
        }
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('home');
    }
}
