<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionplans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('physically_active');
            $table->string('medications');
            $table->string('food_choices');
            $table->string('stress');
            $table->string('health_problems');
            $table->string('how_much');
            $table->string('when');
            $table->string('how_often');
            $table->integer('action_sureness');
            $table->string('barriers');
            $table->string('avoid_barriers');
            $table->string('goal');
            $table->string('subject');
            $table->foreign('subject')->references('subject')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('actionplans');
    }
}
