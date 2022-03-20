<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('crypto_exchange_balances', function (Blueprint $table) {
            $table->rename("crypto_exchange_assets");
        });
    }


    public function down()
    {
        Schema::table('crypto_exchange_assets', function (Blueprint $table) {
            $table->rename("crypto_exchange_balances");
        });
    }
};
