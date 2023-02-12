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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('color', 30);
            $table->year('age');
            $table->string('plate',7);

            $table->unique(['plate']);
        });

        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 255);
            $table->string('cnh', 12);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->unsignedBigInteger('car_id');

            $table->foreign('car_id')->references('id')->on('cars');
            $table->unique(['cnh', 'email', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
        Schema::dropIfExists('cars');
    }
};
