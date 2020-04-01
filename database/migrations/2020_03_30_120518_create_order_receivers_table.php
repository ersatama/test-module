<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_receivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->unsignedBigInteger('order');
            $table->unsignedSmallInteger('type');
            $table->string('name');
            $table->string('iin')->nullable();
            $table->string('code')->nullable();
            $table->unsignedInteger('country');
            $table->string('region');
            $table->string('city');
            $table->string('index')->nullable();
            $table->string('street');
            $table->string('house');
            $table->string('office')->nullable();
            $table->string('person_name');
            $table->string('person_phone');
            $table->string('place');
            $table->string('weight');
            $table->string('volume');
            $table->string('annotation')->nullable();
            $table->string('payment_person_type');
            $table->string('payment_type');
            $table->string('deliver_type');
            $table->string('deliver_payment')->nullable();
            $table->string('deliver_price')->nullable();
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('order_receivers');
    }
}
