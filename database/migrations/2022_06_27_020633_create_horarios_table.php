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
            $table->integer('dia');
			$table->foreign('dia')->references('id_dia')->on('dias');
            $table->integer('slot');
            $table->foreign('slot')->references('id_slots')->on('slots');
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