<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSubjectsAddGroupTypeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            // Add a tinyint for values 1,2,3
            // Concern?  check psql for this type conversion.
            $table->unsignedTinyInteger('group_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            // drop the group_type column
            $table->dropColumn('group_type');
            // Really, you shouldn't really be doing this.
        });
    }
}
