<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalсPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->float('value', 8, 2);
            $table->unsignedInteger('calc_tariff_id')->index();
            $table->unsignedInteger('calc_status_id')->index();
            $table->unsignedInteger('calc_hallmark_id')->index();
            $table->timestamps();
        });

        Schema::table('calc_prices', function (Blueprint $table) {

            $table->foreign('calc_tariff_id')->references('id')->on('calc_tariffs')->onDelete('cascade');
            $table->foreign('calc_status_id')->references('id')->on('calc_statuses')->onDelete('cascade');
            $table->foreign('calc_hallmark_id')->references('id')->on('calc_hallmarks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calc_prices');
    }
}
