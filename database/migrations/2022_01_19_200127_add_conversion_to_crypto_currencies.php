<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    protected static $currencies = [
        "usd", "eur", "chf", "aud", "cad", "jpy", "rub", "cny", "gbp", "btc", "eth"
    ];


    public function up()
    {
        Schema::table('crypto_currencies', function (Blueprint $table) {
            $table->timestamp("fetched_at")->nullable(true)->after("coingecko_id");

            foreach(static::$currencies AS $currency) {
                $table->decimal("currency_" . $currency, 20, 10)
                    ->nullable(true)
                    ->after("coingecko_id");
            }
        });
    }


    public function down()
    {
        Schema::table('crypto_currencies', function (Blueprint $table) {
            $table->dropColumn("fetched_at");

            foreach(static::$currencies AS $currency) {
                $table->dropColumn("currency_" . $currency);
            }
        });
    }
};
