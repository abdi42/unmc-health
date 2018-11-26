<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles');
            $table->boolean('pending_invite')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('role_id')) {
                $table->dropForeign(['role_id']);
            }
            if (Schema::hasColumn('pending_invite')) {
                $table->dropColumn('pending_invite');
            }
        });
    }
}
