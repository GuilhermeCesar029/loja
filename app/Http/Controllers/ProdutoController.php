<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LoginProduct;

class ProdutoController extends Controller
{
    public function index(){
        return view('cadastroProdutos.index');
    }

    public function entrar(Request $request){
        $loginProdutos = validator($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if($loginProdutos->fails()){
            return redirect()-> route('produto.index');
        }else{
            return redirect()-> route('produto.cadastrar.index');
        }
    }

    public function indexcadastro(){
        return view('cadastroProdutos.cadastro');
    }
}
