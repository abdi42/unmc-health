<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMedicationResponsesAddSubjectId extends Migration
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
