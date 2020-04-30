<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProdutoController extends Controller
{
    
    public function index(){
        return view('cadastroProdutos.cadastro');
    }

    public function cadastrar(Request $request){
        $this->validate($request, [
            'titulo'    => 'required',
            'descricao' => 'required',
            'imagem'    => 'required',
            'valor'     => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('produto.cadastrar.index');
    }
}
