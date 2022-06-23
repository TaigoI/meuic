<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('google_id')->nullable();

            $table->string('email')->primary();
            $table->string('matricula')->unique()->nullable();
            $table->string('name');

            $table->string('picture')->nullable();

			$table->string('teacher_status')->default('NO'); //NO, REQUESTED, DENIED, ACCEPTED
            $table->string('user_role')->default('S');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}