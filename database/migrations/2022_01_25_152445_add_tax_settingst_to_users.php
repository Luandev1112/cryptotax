<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Timezone::class)->default(\App\Models\Timezone::TIMEZONE_UTC)->after('current_team_id');
            $table->foreignIdFor(\App\Models\TaxCountry::class)->nullable(true)->after('current_team_id');
            $table->unsignedSmallInteger("tax_year")->nullable(true)->after('current_team_id');
            $table->foreignIdFor(\App\Models\TaxCurrency::class)->nullable(true)->after('current_team_id');
            $table->foreignIdFor(\App\Models\TaxCostModel::class)->nullable(true)->after('current_team_id');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("timezone_id");
            $table->dropColumn("tax_country_id");
            $table->dropColumn("tax_year");
            $table->dropColumn("tax_currency_id");
            $table->dropColumn("tax_cost_model_id");
        });
    }
};
