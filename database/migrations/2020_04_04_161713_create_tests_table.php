<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->string('name', 150);
            $table->tinyInteger('juridical')->default(0);
            $table->string('id', 20)->nullable();
            $table->integer('amo_id')->nullable();
            $table->string('work_phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('fact_address', 255)->nullable();
            $table->string('jur_address', 255)->nullable();
            $table->string('full_name', 400)->nullable();
            $table->string('nds_number', 255)->nullable();
            $table->date('nds_date')->nullable();
            $table->string('bank_account', 255)->nullable();
            $table->string('contract', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('code', 20);
            $table->string('manager', 255)->nullable();
            $table->tinyInteger('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
