<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //se o usuario estiver autenticado como login nao precisa acessar a tela de login.
    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function index(){
        return view('admin.auth.admin-login');
    }

    public function login(Request $request){
        $dados = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        $authOK = Auth::guard('admin')->attempt($dados);

        if($authOK){
            return redirect()->intended(route('admin'));
        }else{
            return redirect()->route('login.admin');
        }
    }
}
