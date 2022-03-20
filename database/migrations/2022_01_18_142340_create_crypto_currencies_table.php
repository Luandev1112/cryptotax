<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('crypto_currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("short_name")->index();
            $table->string("icon")->nullable(true);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('crypto_currencies');
    }
};
