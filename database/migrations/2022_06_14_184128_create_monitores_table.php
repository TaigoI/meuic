<?php

use App\Models\Monitores;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitores', function (Blueprint $table) {
            $table->id('id_monitor');
            $table->string('id_aluno');
            $table->foreign('id_aluno')->references('email')->on('users');
            $table->string('id_disciplina');
            $table->foreign('id_disciplina')->references('id_disciplina')->on('disciplinas');
			$table->string('cor')->default('aqua');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitores');
    }
}