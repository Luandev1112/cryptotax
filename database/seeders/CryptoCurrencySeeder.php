<?php

namespace Database\Seeders;

use App\Models\CryptoCurrency;
use Illuminate\Database\Seeder;

class CryptoCurrencySeeder extends Seeder
{
    public function run()
    {
        $data = CryptoCurrency::updateFromApi();
    }
}
