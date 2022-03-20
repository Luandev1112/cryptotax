<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('wallet_transactions', function (Blueprint $table) {
            $table->index("wallet_asset_id");
        });

        Schema::table('crypto_exchange_transactions', function (Blueprint $table) {
            $table->index("crypto_exchange_account_id");
        });
    }


    public function down()
    {
        Schema::table('wallet_transactions', function (Blueprint $table) {
            $table->dropIndex("wallet_asset_id");
        });

        Schema::table('crypto_exchange_transactions', function (Blueprint $table) {
            $table->dropIndex("crypto_exchange_account_id");
        });
    }
};
