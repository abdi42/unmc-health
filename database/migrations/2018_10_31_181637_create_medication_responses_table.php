<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_responses', function (Blueprint $table) {
            $table->integer('medication_id')->unsigned();
            $table
                ->foreign('medication_id')
                ->references('id')
                ->on('medicationnames')
                ->onDelete('cascade');
            $table->boolean('isTaken');
            $table->string('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medication_responses');
    }
}
