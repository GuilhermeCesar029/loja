<?php

namespace App\Http\Controllers\Produto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProdutoController extends Controller
{
    
    public function index(){
        return view('admin.cadastrar');
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

        return redirect()->route('admin');        
    }

    public function editar($id){
        $produtos = Product::find($id);
        return view('admin.editar', compact('produtos'));
    }

    public function atualizar(Request $request, $id){
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

        Product::find($id)->update($dados);

        return redirect()->route('admin');
        
    }

    public function excluir($id){
        Product::find($id)->delete();
        return redirect()->route('admin');
    }

    public function indexJSON(){
        $produtos = Product::all();
        return json_encode($produtos);
    }
}
