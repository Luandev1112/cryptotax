<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoingeckoSupportedVsCurrenciesSeeder extends Seeder
{
    public function run()
    {
        \App\Models\CoingeckoSupportedVsCurrencies::updateFromApi();
    }
}
