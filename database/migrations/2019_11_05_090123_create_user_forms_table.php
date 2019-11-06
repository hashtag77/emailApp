<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',191)->nullable();
            $table->string('last_name',191)->nullable();
            $table->string('email',191)->nullable();
            $table->string('phone',191)->nullable();
            $table->string('address',191)->nullable();
            $table->string('city',191)->nullable();
            $table->string('state',191)->nullable();
            $table->string('country',191)->nullable();
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
        Schema::dropIfExists('user_forms');
    }
}
