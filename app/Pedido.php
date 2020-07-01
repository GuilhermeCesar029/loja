<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //relacionamento 1 para muitos
    public function pedido_produtos(){
        return $this->hasMany('App\PedidoProduto') 
            ->select(\DB::raw('produto_id, sum(desconto) as descontos, sum(valor) as valores, 
            count(1) as qtd')) //sum faz a soma de todos os campos
            ->groupBy('produto_id')
            ->orderBy('produto_id', 'desc');
    }    
}
