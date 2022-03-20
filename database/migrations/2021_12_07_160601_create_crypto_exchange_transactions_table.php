<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoExchangeTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('crypto_exchange_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\CryptoExchangeAccount::class);
            $table->string("external_id", 100);
            $table->string("order", 100)->nullable(true);
            $table->string("symbol", 50);
            $table->string("type", 20)->nullable(true);
            $table->string("taker_or_maker", 20);
            $table->string("side", 20);
            $table->unsignedDecimal("price", 20, 10);
            $table->unsignedDecimal("amount", 20, 10);
            $table->unsignedDecimal("cost", 20, 10);
            $table->unsignedDecimal("fee_cost", 20, 10)->nullable(true);
            $table->unsignedDecimal("fee_rate", 20, 10)->nullable(true);
            $table->string("fee_currency", 20)->nullable(true);
            $table->json("data")->nullable(true);
            $table->unsignedBigInteger("executed_at");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exchange_transactions');
    }
}
