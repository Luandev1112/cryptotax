<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger("datacenter_id")->change()->default(\App\Models\Datacenter::CENTER_US);
        });
    }


    public function down()
    {
    }
};
