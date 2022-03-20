<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('coingecko_supported_vs_currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 20);
            $table->boolean("supported")->default(0);
            $table->timestamp("created_at")->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('coingecko_supported_vs_currencies');
    }
};
