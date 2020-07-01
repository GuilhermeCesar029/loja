<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $filalble = [
        'user_id',
        'status'
    ];

    //relacionamento 1 para muitos
    public function pedido_produtos(){
        return $this->hasMany('App\PedidoProduto') 
            ->select(\DB::raw('produto_id, sum(desconto) as descontos, sum(valor) as valores, 
            count(1) as qtd')) //sum faz a soma de todos os campos
            ->groupBy('produto_id')
            ->orderBy('produto_id', 'desc');
    }   

    //metodo para pesquisar se ja tem algum pedido reservado para o ususario(id)
    public static function consultaId($where){
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }
}
