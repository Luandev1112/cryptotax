<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccountTypes extends Migration
{
    public function up()
    {
        Schema::create('user_account_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_account_types');
    }
}
