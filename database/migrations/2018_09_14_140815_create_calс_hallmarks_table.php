<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalсHallmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_hallmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hallmark');
            $table->unsignedInteger('calc_tariff_id')->index();
            $table->foreign('calc_tariff_id')->references('id')->on('calc_tariffs')->onDelete('cascade');
            $table->unsignedInteger('calc_category_id')->index();
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
        Schema::dropIfExists('calc_hallmarks');
    }
}
