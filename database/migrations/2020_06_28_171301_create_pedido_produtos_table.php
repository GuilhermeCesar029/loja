<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned(); //unsigned: somente inteiros positivos
            $table->integer('produto_id')->unsigned();
            $table->enum('status', ['RE', 'PA', 'CA']); //Reservado, Pago, Cancelado
            $table->decimal('valor', 6, 2)->default(0); // 6 casas antes da virgula e 2 depois
            $table->decimal('desconto', 6, 2)->default(0);
            $table->integer('cupom_desconto_id')->nullable()->unsigned();//nullable: pode ser nulo
            $table->timestamps();
            //chave estrangeira do campo pedido_id, que faz referencia no campo id da tabela pedidos
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('product');
            $table->foreign('cupom_desconto_id')->references('id')->on('cupom_descontos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produtos');
    }
}
