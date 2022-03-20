<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $short_name
 * @property string $icon
 * @property string $coingecko_id
 * @property \Carbon\Carbon $fetched_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 */
class CryptoCurrency extends Model
{
    public function CryptoExchangeAssets()
    {
        return $this->hasMany(CryptoExchangeAsset::class);
    }


    public function conversions()
    {
        return $this->hasMany(CryptoCurrencyConversion::class);
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function convertTo(float $value, string $otherCurrency): float
    {
        // First check age of last fetch
        if(!$this->fetched_at || $this->fetched_at < now()->addMinutes(-15)) {
            $this->updateRowFromApi();
        }

        // Get var name
        $var = "currency_" . strtolower($otherCurrency);

        return $this->$var * $value;
    }


    public static function findByShortName(string $shortName)
    {
        return static::query()
            ->where("short_name", $shortName)
            ->first();
    }


    protected function updateRowFromApi(): self
    {
        $client = new \Codenixsv\CoinGeckoApi\CoinGeckoClient();
        $vsCurrencies = join(",", CoingeckoSupportedVsCurrencies::getCurrencies());
        $result = $client->simple()->getPrice($this->coingecko_id, $vsCurrencies);

        foreach($result[$this->coingecko_id] AS $currency => $value) {
            $var = "currency_" . strtolower($currency);
            $this->$var = $value;
        }

        // Set fetched_at
        $this->fetched_at = now();
        $this->save();

        return $this;
    }


    public static function updateFromApi()
    {
        $client = new \Codenixsv\CoinGeckoApi\CoinGeckoClient();
        $coinList = $client->coins()->getList();
        $formated = collect($coinList)->map(function ($item) {
            return [
                'name' => $item["name"],
                'short_name' => strtoupper($item["symbol"]),
                'coingecko_id' => $item["id"],
            ];
        });

        $formated->each(function ($data) {
            CryptoCurrency::updateOrCreate([
                "short_name" => $data["short_name"],
            ], $data);
        });
    }
}
