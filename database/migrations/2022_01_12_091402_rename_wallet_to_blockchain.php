<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('wallet_assets', function (Blueprint $table) {
            $table->renameColumn("wallet_id", "blockchain_id");
        });
        Schema::table('wallet_transactions', function (Blueprint $table) {
            $table->renameColumn("wallet_asset_id", "blockchain_asset_id");
        });
        Schema::rename("wallets", "blockchains");
        Schema::rename("wallet_assets", "blockchain_assets");
        Schema::rename("wallet_transactions", "blockchain_transactions");
    }


    public function down()
    {
        Schema::rename("blockchain_transactions", "wallet_transactions");
        Schema::rename("blockchain_assets", "wallet_assets");
        Schema::rename("blockchains", "wallets");

        Schema::table('wallet_assets', function (Blueprint $table) {
            $table->renameColumn("blockchain_id", "wallet_id");
        });
        Schema::table('wallet_transactions', function (Blueprint $table) {
            $table->renameColumn("blockchain_asset_id", "wallet_asset_id");
        });
    }
};
