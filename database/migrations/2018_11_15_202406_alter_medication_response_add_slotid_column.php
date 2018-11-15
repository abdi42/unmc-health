<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMedicationResponseAddSlotidColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('medication_responses', function (Blueprint $table) {
            $table->integer('slot_id')->unsigned();
            $table
                ->foreign('slot_id')
                ->references('id')
                ->on('mnedicationslots')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medication_responses', function (Blueprint $table) {
            $table->dropForeign(['slot_id']);
            $table->dropColumn("slot_id");
        });
    }
}
