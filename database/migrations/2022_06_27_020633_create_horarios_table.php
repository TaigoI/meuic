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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario');
            $table->string('id_monitor');
            $table->foreign('id_monitor')->references('email')->on('users');
            $table->integer('id_dia');
			$table->foreign('id_dia')->references('id_dia')->on('dias');
            $table->integer('id_slot');
            $table->foreign('id_slot')->references('id_slot')->on('slots');
			$table->boolean('ativo')->default(true);
            $table->boolean('online')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
