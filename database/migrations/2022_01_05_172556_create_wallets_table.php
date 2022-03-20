<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\User::class);
            $table->string("address", 50);
            $table->timestamp("fetched_at")->nullable(true);
            $table->timestamp("fetching_scheduled_at")->nullable(true);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('wallets');
    }
};
