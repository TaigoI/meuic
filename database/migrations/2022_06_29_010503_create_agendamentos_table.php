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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id('id_agendamento');
            $table->string('id_disciplina');
            $table->foreign('id_disciplina')->references('id_disciplina')->on('disciplinas');
            $table->string('id_monitor');
            $table->foreign('id_monitor')->references('email')->on('users');
            $table->string('data_agendamento');
            $table->integer('slot_agendamento');
            $table->foreign('slot_agendamento')->references('id_slots')->on('slots');
            $table->string('anotacao_agendamento');
            $table->string('topico_agendamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
};
