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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string("eh_cliente", 1)->default('N');
            $table->string("eh_fornecedor", 1)->default('N');
            $table->string("eh_transportador", 1)->default('N');
            $table->string("nome", 100);
            $table->string("nome_fantasia", 100);
            $table->string("cpf", 14);
            $table->date("data_cadastro");
            $table->string("ativo", 1);
            $table->string("ddd", 4)->nullable();
            $table->string("fone", 10)->nullable();
            $table->string("celular", 10)->nullable();
            $table->string("email", 100);
            $table->string("senha", 15);
            $table->string("cep", 10);
            $table->string("logradouro", 100);
            $table->string("numero", 15);
            $table->string("uf", 2);
            $table->string("cidade", 100);
            $table->string("complemento", 80)->nullable();
            $table->string("bairro", 100);
            $table->string("rg", 20)->nullable();
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
        Schema::dropIfExists('contatos');
    }
};
