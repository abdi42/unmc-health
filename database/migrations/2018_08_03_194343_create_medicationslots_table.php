<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicationslots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->foreign('subject')->references('subject')->on('subjects')->onDelete('cascade');
            $table->time('medication_time');
            $table->string('medication_day');
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
        Schema::dropIfExists('medicationslots');
    }
}
