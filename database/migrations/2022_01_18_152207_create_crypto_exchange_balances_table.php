<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('crypto_exchange_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\CryptoCurrency::class);
            $table->foreignIdFor(\App\Models\CryptoExchangeAccount::class);
            $table->unsignedDecimal("balance", 30, 18)->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('crypto_exchange_balances');
    }
};
