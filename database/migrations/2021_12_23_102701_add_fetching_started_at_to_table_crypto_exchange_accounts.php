<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('crypto_exchange_accounts', function (Blueprint $table) {
            $table->timestamp("fetching_scheduled_at")->nullable(true)->after("credentials");
        });
    }


    public function down()
    {
        Schema::table('crypto_exchange_accounts', function (Blueprint $table) {
            $table->dropColumn("fetching_scheduled_at");
        });
    }
};
