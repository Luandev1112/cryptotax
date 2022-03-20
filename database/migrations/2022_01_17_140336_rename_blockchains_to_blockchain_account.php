<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::rename("blockchains", "blockchain_accounts");

        Schema::table("blockchain_assets", function (Blueprint $table) {
            $table->drop();
        });
    }


    public function down()
    {
        Schema::rename("blockchain_accounts", "blockchains");
    }
};
