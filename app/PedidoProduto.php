<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    //relacionamento da foreign Key(Pedido_id) para a Primary Key(id)
    //pesquisando na tabela produtos o produto informado
    public function produto(){
        return $this->belongsTo('App\Product');//, 'produto_id', 'id');
    }
}
