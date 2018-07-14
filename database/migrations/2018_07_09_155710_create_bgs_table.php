<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('BG');
            $table->string('DataID');
            $table->string('DataSource');
            $table->string('DinnerSituation');
            $table->string('DrugSituation');
            $table->dateTime('LastChangeTime');
            $table->integer('Lat');
            $table->integer('Lon');
            $table->dateTime('MDate');
            $table->string('Note');
            $table->string('TimeZone');
            $table->string('userid');
            $table->foreign('userid')->references('userid')->on('musers')->onDelete('cascade');
            $table->integer('BGUnit');
            $table->integer('CurrentRecordCount');
            $table->string('NextPageUrl');
            $table->integer('PageLength');
            $table->integer('PageNumber');
            $table->string('PrevPageUrl');
            $table->integer('RecordCount');
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
        Schema::dropIfExists('bgs');
    }
}
