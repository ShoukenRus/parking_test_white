<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Car extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('holder_id');
            $table->string('brand')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('color')->nullable(false);
            $table->string('license_plate',30)->nullable(false)->unique();
            $table->string('code_region',4)->nullable(true);
            $table->boolean('is_parked')->default(false);

            $table->foreign('holder_id',)->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
