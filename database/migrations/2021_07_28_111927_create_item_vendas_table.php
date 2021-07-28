<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_venda')->unsigned()->index();
            $table->bigInteger('id_produto')->unsigned()->index();
            $table->bigInteger('quantidade');
            $table->decimal('preco_unitario', 12,2);
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('item_vendas', function (Blueprint $table) {
            $table->foreign('id_venda')->references('id')->on('vendas')->onUpdate('cascade');
            $table->foreign('id_produto')->references('id')->on('produtos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_vendas');
    }
}