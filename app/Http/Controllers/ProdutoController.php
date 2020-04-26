<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProdutoController extends Controller
{
    public function index(){
        return view('cadastroProdutos.index');
    }

    public function entrar(Request $request){
        $loginProdutos = $request->only('email', 'password');

        if(Auth::attempt($loginProdutos)){
            return redirect()->route('produto.cadastrar.index');
        }else{
            return redrect()->route('produto.index');
        }
    }
}
