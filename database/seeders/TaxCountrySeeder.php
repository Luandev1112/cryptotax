<?php

namespace Database\Seeders;

use App\Models\TaxCountry;
use Illuminate\Database\Seeder;

class TaxCountrySeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                "id" => TaxCountry::COUNTRY_USA,
                "name" => "United States of America"
            ],
            [
                "id" => null,
                "name" => "Germany"
            ],
            [
                "id" => null,
                "name" => "Canada"
            ],
            [
                "id" => null,
                "name" => "Austria"
            ],
            [
                "id" => null,
                "name" => "United Kingdom"
            ],
        ];

        foreach($items AS &$item) {
            $item["created_at"] = now();
        }

        // Clear db table
        TaxCountry::query()->truncate();
        TaxCountry::insert($items);
    }
}
