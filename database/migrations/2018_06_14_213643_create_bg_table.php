<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('BG');
            $table->integer('DataID');
            $table->time('DinnerSituation');
            $table->integer('Lat');
            $table->integer('Lon');
            $table->dateTime('MDate');
            $table->integer('userid');
            $table->string('Note');
            $table->string('BGUNIT');
            $table->integer('CURRENTRECORDCOUNT');
            $table->string('NEXTPAGEURL');
            $table->integer('PAGELENGTH');
            $table->integer('PAGENUMBER');
            $table->string('PREVPAGEURL');
            $table->integer('RECORDCOUNT');
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
        Schema::dropIfExists('bg');
    }
}
