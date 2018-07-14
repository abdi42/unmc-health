<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalcontentcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educationalcontentcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('educationalcontent_id');
            $table->foreign('educationalcontent_id')->references('id')->on('educationalcontents')->onDelete('cascade');
            $table->string('category');
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
        Schema::dropIfExists('educationalcontentcategories');
    }
}
