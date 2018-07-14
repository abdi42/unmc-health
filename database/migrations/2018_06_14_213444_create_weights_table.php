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
            $table->integer('CurrentRecordCount');
            $table->string('NextPageUrl');
            $table->integer('PageLength');
            $table->integer('PageNumber');
            $table->string('PrevPageUrl');
            $table->integer('RecordCount');
            $table->float('BMI');
            $table->integer('BoneValue');
            $table->integer('DCI');
            $table->string('DataID');
            $table->string('DataSource');
            $table->integer('FatValue');
            $table->dateTime('LastChangeTime');
            $table->dateTime('MDate');
            $table->integer('MuscaleValue');
            $table->string('Note');
            $table->string('TimeZone');
            $table->integer('VFR');
            $table->integer('WaterValue');
            $table->float('WeightValue');
            $table->dateTime('measurement_time')->nullable();
            $table->time('time_zone')->nullable();
            $table->string('userid');
            $table->foreign('userid')->references('userid')->on('musers')->onDelete('cascade');
            $table->integer('WeightUnit');
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
        Schema::dropIfExists('weights');
    }
}
