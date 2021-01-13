<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Comments;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Comments::TABLE, function (Blueprint $table) {
            $table->bigIncrements(Comments::ID);
            $table->bigInteger(Comments::COMMENT_ID)->nullable();
            $table->bigInteger(Comments::MODULE_ID);
            $table->bigInteger(Comments::USER_ID);
            $table->text(Comments::COMMENT)->nullable();
            $table->string(Comments::AUDIO)->nullable();
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
        Schema::dropIfExists('comments');
    }
}
