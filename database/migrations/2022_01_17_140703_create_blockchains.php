<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockchains extends Migration
{
    public function up()
    {
        Schema::create('blockchains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 100);
            $table->string("class", 150);
            $table->text("description")->nullable(true);
            $table->string("icon", 100)->nullable(true);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('blockchains');
    }
}
