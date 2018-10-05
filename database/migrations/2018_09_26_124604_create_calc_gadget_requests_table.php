<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcGadgetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_gadget_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('office')->nullable();
            $table->string('brand')->nullable();
            $table->string('category')->nullable();
            $table->string('model')->nullable();
            $table->string('cpu')->nullable();
            $table->string('memory')->nullable();
            $table->string('hdd')->nullable();
            $table->string('video')->nullable();
            $table->text('set');
            $table->text('condition');
            $table->integer('price');
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
        Schema::dropIfExists('calc_gadget_requests');
    }
}
