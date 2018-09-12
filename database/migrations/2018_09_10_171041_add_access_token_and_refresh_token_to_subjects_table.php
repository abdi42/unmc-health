<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccessTokenAndRefreshTokenToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('subjects', function(Blueprint $table) {
        $table->longText('access_token')->nullable();
        $table->longText('refresh_token')->nullable();
        $table->integer('expires')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('subjects', function(Blueprint $table) {
        $table->dropColumn('access_token');
        $table->dropColumn('refresh_token');
        $table->dropColumn('expires');
      });
    }
}
