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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 255);
            $table->string('cnh', 12)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->boolean('active')->default(false);

        });

        Schema::create('cars', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('color', 55);
            $table->year('year');
            $table->string('plate',7);

            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers');

            $table->unique(['plate', 'driver_id']);
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
