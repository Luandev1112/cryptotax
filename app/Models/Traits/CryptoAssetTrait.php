<?php

namespace App\Models\Traits;

use App\Models\CryptoCurrency;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property float $balance
 *
 * @property CryptoCurrency $cryptoCurrency
 */
trait CryptoAssetTrait
{
    /**
     * @return BelongsTo
     */
    public function cryptoCurrency(): BelongsTo
    {
        return $this->belongsTo(CryptoCurrency::class);
    }


    /**
     * @param string $currency
     * @return float
     */
    public function convertTo(string $currency = "USD"): float
    {
        return $this->cryptoCurrency ? $this->cryptoCurrency->convertTo($this->balance, $currency) : 0;
    }
}
