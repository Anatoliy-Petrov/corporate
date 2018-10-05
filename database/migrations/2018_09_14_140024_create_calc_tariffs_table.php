<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ru');
            $table->string('title_uk');
            $table->tinyInteger('published')->default(1);
            $table->unsignedInteger('calc_category_id')->index();
            $table->foreign('calc_category_id')->references('id')->on('calc_categories')->onDelete('cascade');
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
        Schema::dropIfExists('calc_tariffs');
    }
}
