<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CryptoExchangeTransaction extends Model
{
    const UPDATED_AT = null;

    protected $casts = [
        "data" => "json"
    ];

    /**
     * @return BelongsTo
     */
    public function cryptoExchangeAccount(): BelongsTo
    {
        return $this->belongsTo(CryptoExchangeAccount::class);
    }
}
