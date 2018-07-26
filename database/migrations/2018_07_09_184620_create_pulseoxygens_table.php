<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePulseoxygensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulseoxygens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('BO');
            $table->string('DataID');
            $table->string('DataSource');
            $table->integer('HR');
            $table->string('LastChangeTime');
            $table->integer('Lat');
            $table->integer('Lon');
            $table->dateTime('MDate');
            $table->integer('TimeZone');
            $table->string('userid');
            $table->foreign('userid')->references('userid')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('pulseoxygens');
    }
}
