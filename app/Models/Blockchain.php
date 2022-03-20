<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $description
 * @property string $class
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property Collection<BlockChainAccount> $blockchainAccounts
 */
class Blockchain extends Model
{
    public static function boot()
    {
        parent::boot();

        static::deleting(function (self $item) {
            $item->blockchainAccounts->each(function($row){
                $row->delete();
            });
        });
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blockchainAccounts(): HasMany
    {
        return $this->hasMany(BlockchainAccount::class);
    }


    public function getName(): string
    {
        return $this->name;
    }
}
