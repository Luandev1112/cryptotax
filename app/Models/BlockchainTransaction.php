<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 * @property int $blockchain_account_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 *
 * @property BlockchainAccount $blockchain
 * @property User $user
 */
class BlockchainTransaction extends Model
{
    const UPDATED_AT = null;


    public function blockchainAccount(): BelongsTo
    {
        return $this->belongsTo(BlockchainAccount::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
