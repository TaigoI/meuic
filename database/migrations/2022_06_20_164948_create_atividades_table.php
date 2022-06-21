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
        Schema::create('atividades', function (Blueprint $table) {
            $table->id('id_atividade');
            $table->string('id_monitor');
            $table->foreign('id_monitor')->references('email')->on('users');
            $table->string('desc_atividade');
            $table->integer('tempo_gasto');
            $table->integer('dia_atividade');
            $table->string('mes_atividade');
            $table->integer('ano_atividade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
};
