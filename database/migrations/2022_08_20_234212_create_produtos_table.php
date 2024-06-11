<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('produto', 100);
            $table->string('eh_produto', 1)->nullable();
            $table->string('eh_insumo', 1)->nullable();
            $table->decimal('preco', 10, 2)->default(0.00);
            $table->string('imagem', 255)->nullable();
            $table->string('ativo', 1)->default("S");

            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->bigInteger('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades');
            
            $table->timestamps();
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
};
