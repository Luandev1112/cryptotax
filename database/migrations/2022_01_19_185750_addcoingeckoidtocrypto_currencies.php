<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('crypto_currencies', function (Blueprint $table) {
            $table->string("coingecko_id", 100)
                ->nullable(true)
                ->after("icon");
        });
    }


    public function down()
    {
        Schema::table('crypto_currencies', function (Blueprint $table) {
            $table->dropColumn("coingecko_id");
        });
    }
};
