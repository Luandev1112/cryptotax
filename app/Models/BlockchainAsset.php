<?php

namespace App\Models;

use App\Models\Traits\CryptoAssetTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property BlockchainAccount $blockchainAccount
 */
class BlockchainAsset extends Model
{
    use CryptoAssetTrait;

    /**
     * @return BelongsTo
     */
    public function blockchainAccount(): BelongsTo
    {
        return $this->belongsTo(BlockchainAccount::class);
    }
}
