<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaEntradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->integer('indice');
            $table->string("padrao",10);
            $table->string("status",10);
            $table->string("alarme",10);
            $table->unsignedBigInteger('id_clp');
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('id_maquina');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_clp')->references('id')->on('clp');
            $table->foreign('id_evento')->references('id')->on('eventos');
            $table->foreign('id_maquina')->references('id')->on('maquinas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
