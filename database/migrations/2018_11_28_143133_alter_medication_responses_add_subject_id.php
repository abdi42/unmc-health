<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMedicationResponsesAddSubjectId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medication_responses', function (Blueprint $table) {
            $table->string('subject_id');
            $table
                ->foreign('subject_id')
                ->references('subject')
                ->on('subjects')
                ->onDelete('cascade');
        });

        foreach (\App\MedicationResponse::all() as $response) {
            $slot = \App\Medicationslot::findOrFail($response->slot_id);
            $response->subject_id = $slot->subject;
            $response->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medication_responses', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);
            $table->dropColumn("subject_id");
        });
    }
}
