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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id();
            $table->integer('localizacao_id');
            $table->integer('tipo_movimento_id');
            $table->integer('produto_id');
            $table->integer('ordem_compra_id')->nullable();
            $table->integer('pedido_id')->nullable();
            $table->integer('entrada_avulsa_id')->nullable();
            $table->integer('saida_avulsa_id')->nullable();
            $table->integer('ordem_producao_id')->nullable();
            $table->string('ent_sai', 1);
            $table->date('data_movimento');
            $table->integer('qtde_movimento');
            $table->decimal('valor_movimento', 10, 2)->default(0);
            $table->decimal('subtotal_movimento', 10, 2)->default(0);
            $table->string('descricao');
            $table->integer('saldoestoque');
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
        Schema::dropIfExists('movimentos');
    }
};
