<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirtualVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table
                ->foreign('subject')
                ->references('subject')
                ->on('subjects')
                ->onDelete('cascade');
            $table->dateTime('date');
            $table->longText('notes')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_visits');
    }
}
