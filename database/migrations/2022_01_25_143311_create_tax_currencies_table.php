<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('tax_currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 100);
            $table->string("symbol", 5)->nullable();
            $table->string("icon", 50)->nullable(true);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tax_currencies');
    }
};
