<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicationnames', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicationslot_id')->unsigned();
            $table->foreign('medicationslot_id')->references('id')->on('medicationslots')->onDelete('cascade');
            $table->string('medication_name');
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
        Schema::dropIfExists('medicationnames');
    }
}
