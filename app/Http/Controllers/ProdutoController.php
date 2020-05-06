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

        $dados = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $numero = rand(1111,9999);
            $diretorio = "img/cursos/";
            $extensao = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$numero.".".$extensao;
            $imagem->move($diretorio,$nomeImagem);
            $dados['imagem'] = $diretorio."/".$nomeImagem;
          }

        Product::create($dados);

        return redirect()->route('produto.cadastrar.index');        
    }

    public function editar($id){

    }

    public function atualizar(Request $request, $id){

    }

    public function deletar($id){

    }
}
