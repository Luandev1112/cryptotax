<?php

namespace App\Models;

use App\Models\Traits\HasName;
use Illuminate\Database\Eloquent\Model;

class CryptoExchange extends Model
{
    use HasName;
    const EXCHANGE_KUCOIN = 1;
    const EXCHANGE_HITBTC = 2;
    const EXCHANGE_BINANCE = 3;
    const EXCHANGE_HUOBI = 4;
    protected $fillable = [
        "name", "active"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cryptoExchangeAccounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CryptoExchangeAccount::class);
    }
}
