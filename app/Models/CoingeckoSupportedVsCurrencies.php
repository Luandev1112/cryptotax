<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property boolean $supported
 */
class CoingeckoSupportedVsCurrencies extends Model
{
    const UPDATED_AT = null;

    // FIAT
    const CURRENCY_US_DOLLAR = "USD";
    const CURRENCY_EURO = "EUR";
    const CURRENCY_SWISS_FRANC = "CHF";
    const CURRENCY_AUSTRALIAN_DOLLAR = "AUD";
    const CURRENCY_CANADIAN_DOLLAR = "CAD";
    const CURRENCY_JAPANESE_YEN = "JPY";
    const CURRENCY_BRITISH_POUND = "GBP";
    const CURRENCY_CHINESE_YUAN = "CNY";
    const CURRENCY_RUSSIAN_RUBEL = "RUB";
    // Others
    const CURRENCY_BITCOIN = "BTC";
    const CURRENCY_ETHEREUM = "ETH";


    public function getName(): string
    {
        return $this->name;
    }


    public static function getCurrencies(): array
    {
        return [
            static::CURRENCY_US_DOLLAR,
            static::CURRENCY_EURO,
            static::CURRENCY_SWISS_FRANC,
            static::CURRENCY_AUSTRALIAN_DOLLAR,
            static::CURRENCY_CANADIAN_DOLLAR,
            static::CURRENCY_JAPANESE_YEN,
            static::CURRENCY_BRITISH_POUND,
            static::CURRENCY_CHINESE_YUAN,
            static::CURRENCY_RUSSIAN_RUBEL,
            // Others
            static::CURRENCY_BITCOIN,
            static::CURRENCY_ETHEREUM,
        ];
    }


    public static function updateFromApi()
    {
        $client = new \Codenixsv\CoinGeckoApi\CoinGeckoClient();
        $currencies = $client->simple()->getSupportedVsCurrencies();
        $array = [];
        $supported = static::getCurrencies();

        foreach($currencies AS $item) {
            $array[] = [
                "name" => strtoupper($item),
                "supported" => in_array(strtoupper($item), $supported)
            ];
        }

        // Clear table
        self::query()->truncate();

        // Insert
        self::insert($array);
    }
}
