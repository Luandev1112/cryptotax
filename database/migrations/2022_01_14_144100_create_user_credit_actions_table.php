<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCreditActionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_credit_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char("action_code", 4)->index();
            $table->string("name");
            $table->string("name_public");
            $table->decimal("value", 8, 2)->nullable();
            $table->timestamp("valid_from")->nullable();
            $table->timestamp("valid_till")->nullable();
            $table->timestamp("created_at")->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_credit_actions');
    }
}
