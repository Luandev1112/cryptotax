<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('blockchain_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\CryptoCurrency::class)->index();
            $table->foreignIdFor(\App\Models\BlockchainAccount::class)->index();
            $table->unsignedDecimal("balance", 30, 18)->default(0);
            $table->string("contract_address", 255)->nullable();
            $table->string("symbol", 25)->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('blockchain_assets');
    }
};
