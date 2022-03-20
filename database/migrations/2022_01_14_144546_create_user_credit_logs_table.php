<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_credit_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\UserCreditAction::class)->nullable(true)->index();
            $table->char("action_code")->index();
            $table->decimal("value", 8, 2);
            $table->timestamp("created_at")->useCurrent();

            // Index
            $table->index(["user_id", "action_code"]);
        });

        Schema::table("users", function (Blueprint $table) {
            $table->decimal("credits", 8, 2)->default(0)->after("email");
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_credit_logs');

        Schema::table("users", function (Blueprint $table) {
            $table->dropColumn("credits");
        });
    }
};
