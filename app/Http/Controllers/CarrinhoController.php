<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Pedido;

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
        
        //debug
        dd([
            $pedidos,
            $pedidos[0]->pedido_produtos,
            $pedidos[0]->pedido_produtos[0]->produto
        ]);
        return view('carrinho.index', compact('pedidos'));
    }
}
