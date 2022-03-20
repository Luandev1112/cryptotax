<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('timezones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('timezones');
    }
};
