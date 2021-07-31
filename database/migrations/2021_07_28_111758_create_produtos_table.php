<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_fabricante')->unsigned()->index();
            $table->bigInteger('id_fornecedor')->unsigned()->index();
            $table->string('nome');
            $table->string('categoria');
            $table->decimal('valor_compra', 12,2)->nullable();
            $table->decimal('valor_venda', 12,2);
            $table->bigInteger('quantidade');
            $table->date('data_emissao');
            $table->date('data_caducidade');
            $table->text('descricao');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('id_fabricante')->references('id')->on('fabricantes')->onUpdate('cascade');
            $table->foreign('id_fornecedor')->references('id')->on('fornecedores')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}