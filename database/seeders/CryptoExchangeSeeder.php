<?php

namespace Database\Seeders;

use App\CryptoExchangeDrivers\BinanceDriver;
use App\CryptoExchangeDrivers\HitBTCDriver;
use App\CryptoExchangeDrivers\KucoinDriver;
use App\Models\CryptoExchange;
use Illuminate\Database\Seeder;

class CryptoExchangeSeeder extends Seeder
{
    public function run()
    {
        CryptoExchange::query()->truncate();

        collect([
            [
                'id' => CryptoExchange::EXCHANGE_KUCOIN,
                'name' => "Kucoin",
                'description' => 'KuCoin is a cryptocurrency exchange based in Hong Kong. US-investors are not listed as prohibited from trading. If you are a US-investor, however, you should still always analyse yourself whether your home state imposes any obstacles for your foreign cryptocurrency trading.',
                'website' => "https://www.kucoin.com/",
                'driver' => KucoinDriver::class
            ],
            [
                'id' => CryptoExchange::EXCHANGE_HITBTC,
                'name' => "HitBTC",
                'description' => 'HitBTC lorem ipsum dolor.',
                'website' => "https://hitbtc.com/",
                'driver' => HitBTCDriver::class
            ],
            [
                'id' => CryptoExchange::EXCHANGE_BINANCE,
                'name' => "Binance",
                'description' => 'Binance lorem ipsum dolor.',
                'website' => "https://binance.com/",
                'driver' => BinanceDriver::class
            ],
        ])->each(function($data){
            $item = new CryptoExchange($data);
            $item->save();
        });
    }
}
