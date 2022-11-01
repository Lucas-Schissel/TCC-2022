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
            $table->unsignedBigInteger('id_entradas');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_entradas')->references('id')->on('entradas');
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
