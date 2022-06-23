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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->char('reason', 100);
            $table->dateTime('begin');
            $table->dateTime('end');
            $table->unsignedSmallInteger('session');
            $table->char('color', 10)->default('#1ABC9C');
            $table->char('textColor', 10)->default('#000000');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('booked_id');
            //Relacionamento
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('appointments');
    }
};
