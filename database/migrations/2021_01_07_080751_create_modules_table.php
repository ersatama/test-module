<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Module;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Module::TABLE, function (Blueprint $table) {
            $table->bigIncrements(Module::ID);
            $table->string(Module::TITLE)->nullable();
            $table->date(Module::DATE)->useCurrent();
            $table->enum(Module::STATUS,[Module::ACTIVE,Module::INACTIVE])->default(Module::ACTIVE);
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
        Schema::dropIfExists(Module::TABLE);
    }
}
