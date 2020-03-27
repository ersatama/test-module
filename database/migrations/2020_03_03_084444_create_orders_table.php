<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user');
            $table->string('name');
            $table->string('iin')->nullable();
            $table->smallInteger('country');
            $table->string('region');
            $table->smallInteger('city');
            $table->string('index')->nullable();
            $table->string('street');
            $table->string('house');
            $table->string('office')->nullable();
            $table->string('person_name');
            $table->string('person_phone');
            $table->string('take_date');
            $table->string('take_time');
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
        Schema::dropIfExists('orders');
    }
}
