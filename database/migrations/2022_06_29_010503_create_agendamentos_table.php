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
			
            $table->foreignId('id_horario');
            $table->foreign('id_horario')->references('id_horario')->on('horarios');

            $table->timestamp('data');
			$table->unique(['id_horario', 'data']);

            $table->string('anotacao');
            $table->string('topico');

			$table->string('requerente');
            $table->foreign('requerente')->references('email')->on('users');
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
