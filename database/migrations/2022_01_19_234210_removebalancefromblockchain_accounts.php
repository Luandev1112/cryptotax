<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('blockchain_accounts', function (Blueprint $table) {
            $table->dropColumn("balance");
        });
    }


    public function down()
    {
        Schema::table('blockchain_accounts', function (Blueprint $table) {
            $table->decimal("balance", 8,2)->default(0)->after("address");
        });
    }
};
