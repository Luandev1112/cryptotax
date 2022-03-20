<?php

namespace Database\Seeders;

use App\Models\TaxCountry;
use App\Models\TaxCurrency;
use Illuminate\Database\Seeder;

class TaxCurrencySeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                "id" => TaxCurrency::CURRENCY_USD,
                "name" => "US Dollar",
                "symbol" => "USD",
            ],
            [
                "id" => TaxCurrency::CURRENCY_EUR,
                "name" => "Euro",
                "symbol" => "EUR",
            ],
        ];

        foreach($items AS &$item) {
            $item["created_at"] = now();
        }

        // Clear db table
        TaxCurrency::query()->truncate();
        TaxCurrency::insert($items);
    }
}
