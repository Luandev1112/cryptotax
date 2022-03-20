<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("wallet_asset_id");
            $table->string("block_hash", 70);
            $table->unsignedInteger("block_number");
            $table->unsignedInteger("confirmations");
            $table->string("contract_address", 70);
            $table->unsignedDecimal("cumulative_gas_used", 26, 18);
            $table->string("from", 70);
            $table->unsignedDecimal("gas", 26, 18);
            $table->unsignedDecimal("gas_price", 26, 18);
            $table->unsignedDecimal("gas_used", 26, 18);
            $table->string("hash", 70);
            $table->text("input");
            $table->boolean("is_error");
            $table->unsignedInteger("nonce");
            $table->unsignedInteger("time_stamp");
            $table->string("to", 70);
            $table->unsignedInteger("transaction_index");
            $table->boolean("txreceipt_status");
            $table->unsignedDecimal("value", 30, 18);
            $table->timestamp("created_at")->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
