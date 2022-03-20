<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('crypto_exchange_transactions', function (Blueprint $table) {
            $table->string("taker_or_maker", 20)->nullable(true)->change();
        });
    }


    public function down()
    {
        Schema::table('crypto_exchange_transactions', function (Blueprint $table) {
            $table->string("taker_or_maker", 20)->nullable(false)->change();
        });
    }
};
