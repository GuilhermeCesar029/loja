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
        //verifica de requisição enviada tem um token de segurança valido
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

    public function remover(Request $request){
        $this->middleware('VerifyCsrfToken');


        $idpedido           = $request->input('pedido_id'); //define de qual pedido vamos remover um ou mais itens
        $idproduto          = $request->input('produto_id');//define qual produto que vamos remover
        $remove_apenas_item = (boolean)$request->input('item');//define se vamos remover apenas um item ou todos os itens do carrinho 
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE'
        ]);
        
        //se o pedido($idpedido) for vazio, retorna mensagem
        if( empty($idpedido) ){
            $request->session()->flash('mensagem-falha', 'Pedido não encontrado!');

            return redirect()->route('carrinho.index');
        }

        //recebe o id do pedido e do produto
        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        //orderBy descrecente pois o ultimo a ser inserido será o primeiro a ser removido
        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        //verifica se a variavel produto contem o atributo id
        if( empty($produto->id) ){
            $request->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');

            return redirect()->route('carrinho.index');
        }

        //verifica se ele deseja remover apenas um item
        if($remove_apenas_item){
            //atribuindo ao array where_produto o item id que recebe o id do produto encontrado
            $where_produto['id'] = $produto->id;
        }

        //remove todos os itens 
        PedidoProduto::where($where_produto)->delete();

        //verificando na tabela PedidoProduto se existe mais algun item vinculado ao pedido que estamos deletando os itens do carrinho
        $check_pedido = PedidoProduto::where([     //se existir retorna true
            'pedido_id' => $produto->pedido_id
        ])->exists();
        
        //se nenhum item esta vinculado a este pedido ele pode ser deletado. para nao mater lixo na base
        if(!$check_pedido){
            Pedido::where([
                'id' => $produto->pedido_id
            ])->delete();
        }

        $request->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('carrinho.index');
    }

    public function concluir(Request $request){
        //verifica se o token é valido
        $this->middleware('VerifyCsrfToken');

        //define qual pedido que vamos concluir
        $idpedido   = $request->input('pedido_id');
        
        $idusuario = Auth::id();

        //verifica se existe algum registro reservado com o id do pedido para oo usuario que esta logado
        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE'
        ])->exists();
        //se nao tiver nenhum registro reservado para este usuario, mostra mensagem
        if(!$check_pedido){
            $request->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        //se existe algum produto vinculado a este pedido
        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido
        ])->exists();
        //se nao imprime a mensagem
        if(!$check_produtos){
            $request->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.index');
        }

        //altera todos os produtos vinculado a este pedido para o status Pago
        PedidoProduto::where([
            'pedido_id' => $idpedido
        ])->update([
            'status' => 'PA'
        ]);

        //altera o pedido para pago
        Pedido::where([
            'id' => $idpedido
        ])->update([
            'status' => 'PA'
        ]);

        $request->session()->flash('mensagem-sucesso', 'Compra concluida com sucesso!');

        return redirect()->route('carrinho.compras');
    }

    public function compras(){
        //atribuindo a variavel todos os pedidos com status pago que pertence ao usuario logado. ordenando pela data de criação
        $compras = Pedido::where([
            'status'  => 'PA',
            'user_id' => Auth::id()
        ])->orderBy('created_at', 'desc')->get();
        
        //cancelados, ordenando pelos alterados recentemente
        $cancelados = Pedido::where([
            'status'  => 'CA',
            'user_id' => Auth::id()
        ])->orderBy('updated_at', 'desc')->get();

        return view('carrinho.compras', compact('compras', 'cancelados'));
    }

    public function cancelar(Request $request){
        //verifica se o token é valido
        $this->middleware('VerifyCsrfToken');

        $idpedido          = $request->input('pedido_id');
        $idspedido_prod    = $request->input('id');
        $idusuario        = Auth::id();

        //verifica se os  idspedido_prod enviados do produto sao vazios, se for envia mendagem de falha.
        if( empty($idspedido_prod) ){
            $request->session()->flash('mensagem-falha', 'Nenhum intem selecionado para o cancelamento!');

            return redirect()->route('carrinho.compras');
        }

        //Verificação, so irá cancelar os pedidos de o status for pago.
        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'PA' //pago
        ])->exists();
        //se nao achar o produto com as especificações acima, mostra a mensagem de falha.
        if( !$check_pedido ){
            $request->session()->flash('mensagem-falha', 'Pedido não encontrado para cancelamento!');

            return redirect()->route('carrinho.compras');
        }

        //primeiro passa o pedido que vamos consultar, e depois enviamos um array com os ids recebido na requisição, usando whereIn
        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido,
            'status'    => 'PA'
        ])->whereIn('id', $idspedido_prod)->exists();

        if( !$check_produtos ){
            $request->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');

            return redirect()->route('carrinho.compras');
        }

        //passamos o pedido com o status pago, e depois atualizamos no banco de dados a coluna status
        PedidoProduto::where([
            'pedido_id' => $idpedido,
            'status'    => 'PA'
        ])->whereIn('id', $idspedido_prod)->update([
            'status' => 'CA'
        ]);

        //vericamos se ainda existe algum item vinculado a este pedido com o status pago
        $check_pedido_cancel = PedidoProduto::where([
            'pedido_id' =>$idpedido,
            'status'    => 'PA'
        ])->exists();
        //caso nao tenha ficado nenhum item vinculado ao pedido pago, cancelamos o pedido
        if( !$check_pedido_cancel ){
            Pedido::where([
                'id' => $idpedido
            ])->update([
                'status' => 'CA'
            ]);
            //se o pedido for cancelado
            $request->session()->flash('mensagem-sucesso', 'Compra cancelado com sucesso!');
        }else{
            $request->session()->flash('mensagem-sucesso', 'Iten(ns) da compra cancelado(S) com sucesso!');
        }
        return redirect()->route('carrinho.compras');
    }

}
