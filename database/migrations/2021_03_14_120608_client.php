<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients',function (Blueprint $table) {
           $table->id();
           $table->string('lastname');
           $table->string('firstname');
           $table->string('middlename');
           $table->boolean('is_male');
           $table->string('phone', 25)->nullable(false)->unique();
           $table->text('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
