<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserAccountTypeToUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\UserAccountType::class)
                ->default(\App\Models\UserAccountType::TYPE_CUSTOMER_FREE)
                ->after('id');
        });
    }

    public function down()
    {
    }
}
