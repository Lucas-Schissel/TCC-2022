<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaAlarmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarmes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_maquina');
            $table->unsignedBigInteger('id_evento');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_maquina')->references('id')->on('maquinas');
            $table->foreign('id_evento')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alarmes');
    }
}
