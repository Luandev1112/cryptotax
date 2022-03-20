<?php

namespace Database\Seeders;

use App\Models\Timezone;
use DateTimeZone;
use Illuminate\Database\Seeder;

class TimezoneSeeder extends Seeder
{
    public function run()
    {
        $items = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

        // Move utc to first place:
        $items = collect(array_merge(["UTC"], array_filter($items, function($val) {
            return $val !== "UTC";
        })))->map(function($val){
            return [
                "name" => $val,
                "created_at" => now()
            ];
        });

        // Clear db table
        Timezone::query()->truncate();
        Timezone::insert($items->toArray());
    }
}
