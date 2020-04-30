<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LoginProduct;

class LoginProductController extends Controller
{
    public function index(){
        return view('cadastroProdutos.index');
    }

    public function entrar(Request $request){
        $loginUser = $request->only('email', 'password');

        if(Auth::attempt($loginUser)){
            return redirect()->route('produto.index');
        }else{
            return redirect()->route('produto.cadastrar.index');
        }
    }

}
