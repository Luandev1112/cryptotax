<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoExchangeAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('crypto_exchange_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\CryptoExchange::class);
            $table->json("credentials")->nullable();
            $table->timestamp("fetched_at")->nullable(true);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('crypto_exchange_accounts');
    }
}
