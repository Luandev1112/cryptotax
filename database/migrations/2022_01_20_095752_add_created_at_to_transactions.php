<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        \Illuminate\Support\Facades\DB::select("ALTER TABLE `crypto_exchange_transactions` ADD `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `executed_at`;");
    }


    public function down()
    {
        Schema::table('crypto_exchange_transactions', function (Blueprint $table) {
            $table->dropColumn("created_at");
        });
    }
};
