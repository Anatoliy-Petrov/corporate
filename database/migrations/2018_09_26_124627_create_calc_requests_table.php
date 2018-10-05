<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->float('weight', 6, 3);
            $table->string('category');
            $table->boolean('stone')->default(0);
            $table->integer('hallmark');
            $table->string('tariff');
            $table->string('client_status');
            $table->string('term');
            $table->integer('amount');
            $table->integer('overpayment');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('calc_requests');
    }
}
