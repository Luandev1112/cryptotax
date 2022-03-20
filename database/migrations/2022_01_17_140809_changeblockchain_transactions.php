<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('blockchain_transactions', function (Blueprint $table) {
            $table->renameColumn("blockchain_asset_id", "blockchain_account_id");
            $table->foreignIdFor(\App\Models\User::class)->after("blockchain_asset_id")->index();
        });
    }


    public function down()
    {
        Schema::table('blockchain_transactions', function (Blueprint $table) {
            $table->dropColumn("user_id");
            $table->renameColumn("blockchain_account_id", "blockchain_asset_id");
        });
    }
};
