<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalсMaxAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_max_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('calc_tariff_id')->index();
            $table->foreign('calc_tariff_id')->references('id')->on('calc_tariffs')->onDelete('cascade');
            $table->unsignedInteger('value');
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
        Schema::dropIfExists('calc_max_amounts');
    }
}
