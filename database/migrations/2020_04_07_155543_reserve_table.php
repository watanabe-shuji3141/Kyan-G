<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('huri');
            $table->string('tel');
            $table->string('email');
            $table->string('addr');
            $table->date('start_day')->nullable();
            $table->date('end_day')->nullable();
            $table->integer('adult');
            $table->integer('child');
            $table->integer('num');
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
        Schema::dropIfExists('reserve');        
    }
}
