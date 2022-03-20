<?php

namespace App\Models;

use App\Models\Traits\CryptoAssetTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property CryptoExchangeAccount $cryptoExchangeAccount
 */
class CryptoExchangeAsset extends Model
{
    use CryptoAssetTrait;

    /**
     * @return BelongsTo
     */
    public function cryptoExchangeAccount(): BelongsTo
    {
        return $this->belongsTo(CryptoExchangeAccount::class);
    }
}
