<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->foreign('subject')->references('subject')->on('subjects')->onDelete('cascade');
            $table->string('medication_name1');
            $table->string('medication_name2')->nullable();
            $table->string('medication_name3')->nullable();
            $table->time('medication_time');
            $table->string('medication_days');
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
        Schema::dropIfExists('medications');
    }
}
