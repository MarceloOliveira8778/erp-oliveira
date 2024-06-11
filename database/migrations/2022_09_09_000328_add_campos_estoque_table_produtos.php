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
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('estoque_inicial')->default(0);
            $table->integer('estoque_minimo')->default(0);
            $table->integer('estoque_maximo')->default(0);
            $table->integer('estoque_atual')->default(0);
            $table->integer('estoque_reservado')->default(0);
            $table->integer('estoque_real')->default(0); //estoque_atual + estoque_reservado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('estoque_inicial');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
            $table->dropColumn('estoque_atual');
            $table->dropColumn('estoque_reservado');
            $table->dropColumn('estoque_real');
        });
    }
};
