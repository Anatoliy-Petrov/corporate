<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalсRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('calc_tariff_id')->index();
            $table->unsignedInteger('calc_max_amount_id')->index();
            $table->unsignedInteger('calc_status_id')->index();
            $table->unsignedInteger('calc_term_id')->index();
            $table->float('value', 6, 3);
            $table->timestamps();
        });

        Schema::table('calc_rates', function (Blueprint $table) {
            $table->foreign('calc_tariff_id')->references('id')->on('calc_tariffs')->onDelete('cascade');
            $table->foreign('calc_max_amount_id')->references('id')->on('calc_max_amounts')->onDelete('cascade');
            $table->foreign('calc_status_id')->references('id')->on('calc_statuses')->onDelete('cascade');
            $table->foreign('calc_term_id')->references('id')->on('calc_terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calc_rates');
    }
}
