<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('user_account_types', function (Blueprint $table) {
            $table->unsignedInteger("duration_in_months")->nullable(true)->after("name");
            $table->smallInteger("max_csv_upload")->nullable(true)->after("name");
            $table->smallInteger("max_backups")->nullable(true)->after("name");
            $table->unsignedDecimal("price_per_month", 6, 2)->nullable(true)->after("name");
            $table->unsignedDecimal("price_per_year", 6, 2)->nullable(true)->after("name");
            $table->boolean("is_customer")->default(1)->after("name");
            $table->boolean("active")->default(0)->after("name");
        });
    }


    public function down()
    {
        Schema::dropIfExists('account_types');
    }
};
