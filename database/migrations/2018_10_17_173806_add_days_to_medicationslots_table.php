<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDaysToMedicationslotsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('medicationslots', function (Blueprint $table) {
      $table->boolean('sunday')->default(false);
      $table->boolean('monday')->default(false);
      $table->boolean('tuesday')->default(false);
      $table->boolean('wednesday')->default(false);
      $table->boolean('thursday')->default(false);
      $table->boolean('friday')->default(false);
      $table->boolean('saturday')->default(false);
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
      $table->dropColumn('sunday');
      $table->dropColumn('monday');
      $table->dropColumn('tuesday');
      $table->dropColumn('wednesday');
      $table->dropColumn('thursday');
      $table->dropColumn('friday');
      $table->dropColumn('saturday');
    });
  }
}
