<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('BPL');
            $table->string('DataID');
            $table->string('DataSource');
            $table->integer('HP');
            $table->integer('HR');
            $table->integer('IsArr');
            $table->integer('LP');
            $table->dateTime('LastChangeTime');
            $table->integer('Lat');
            $table->integer('Lon');
            $table->dateTime('MDate');
            $table->string('Note');
            $table->string('TimeZone');
            $table->string('userid');
            $table->integer('BPUnit');
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
        Schema::dropIfExists('bps');
    }
}
