<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoExchangesTable extends Migration
{
    public function up()
    {
        Schema::create('crypto_exchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 100);
            $table->text("description")->nullable();
            $table->string("website", 255)->nullable();
            $table->string("driver", 100)->nullable();
            $table->boolean("active")->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('crypto_exchanges');
    }
}
