<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSubjectsAddEnrollmentEndDateField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            // Add a date field for when enrollment is over.
            $table->date('enrollment_end_date')->nullable();
        });
        // By default, we'll set the end enrollment based on Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS.
        // See Subject model :)
        $days = \App\Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS;
        foreach (\App\Subject::all() as $subject) {
            // add some seconds based on num days.
            $default_end_date = strtotime($subject->enrollmentdate)+86400*$days;
            $subject->enrollment_end_date = date("Ymd", $default_end_date);
            $subject->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('enrollment_end_date');
        });
    }
}
