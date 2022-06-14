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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->string('google_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
			$table->string('picture_url')->nullable();
			$table->string('siape')->nullable();
			$table->string('requested_teacher')->default('NO'); //NO, REQUESTED, DENIED, ACCEPTED
			$table->string('role')->default('S');
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
};
