<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('BMI');
            $table->integer('BoneValue');
            $table->string('DataID');
            $table->integer('MuscaleValue');
            $table->integer('Note');
            $table->integer('WaterValue');
            $table->integer('WeightValue');
            $table->string('NEXTPAGEURL');
            $table->integer('CURRENTRECORDCOUNT');
            $table->integer('PAGELENGTH');
            $table->integer('PAGENUMBER');
            $table->integer('PREVPAGEURL');
            $table->integer('RECORDCOUNT');
            $table->string('WEIGHTUNIT');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weights');
    }
}
