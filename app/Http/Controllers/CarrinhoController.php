<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Pedido;
use App\Product;
use App\PedidoProduto;

class CarrinhoController extends Controller
{
    public function __construct(){
        //obriga o usuario estar logado
        $this->middleware('auth');
    }

    public function index(){
        $pedidos = Pedido::where([
            'status'  => 'RE',
            'user_id' => Auth::id()  //informa o id do usuario logado
        ])->get();
        
    
        return view('carrinho.index', compact('pedidos'));
    }

    public function adicionar(Request $request){
        //verifica de requisição enviada tem um token de segurança
        $this->middleware('VerifyCsrfToken');

        $idproduto = $request->input('id');

        $produto = Product::find($idproduto);
        // se o produto nao for encontrado ele ira retornar para a pagina carrinho.index
        if( empty($produto->id) ){
            $request->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!'); //flash mensagem temporaria

            return redirect()->route('carrinho.index');
        }
        
        $idususario = Auth::id();

        //se tiver pedido reservado deste ususario
        $idpedido = Pedido::consultaId([
            'user_id' => $idususario,
            'status'  => 'RE'
        ]);

        //se nao tiver pedido reservado
        if( empty($idpedido) ){
            $pedido_novo = Pedido::create([
                'user_id' => $idususario,
                'status'  =>'RE'
            ]);

            $idpedido = $pedido_novo->id;
        }

        //criando relacionamento
        PedidoProduto::create([
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto,
            'valor'      => $produto->valor,
            'status'     => 'RE'
        ]);

        //mensagem de sucesso

        $request->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('carrinho.index');

    }

}
