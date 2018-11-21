<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMedicationslotsAddSlotNotificationPreference extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicationslots', function (Blueprint $table) {
            $table->boolean('notification_preference')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicationslots', function (Blueprint $table) {
            $table->dropColumn("notification_preference");
        });
    }
}
