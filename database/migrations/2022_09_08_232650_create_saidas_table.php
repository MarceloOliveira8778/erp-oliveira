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
        Schema::create('saidas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produto_id')->unsigned();
            $table->bigInteger('localizacao_id');
            $table->integer('qtde_saida')->default(1);
            $table->decimal('valor_saida')->default(0);
            $table->decimal('subtotal_saida', 10, 2)->unsigned();
            $table->date('data_saida');

            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('saidas');
    }
};
