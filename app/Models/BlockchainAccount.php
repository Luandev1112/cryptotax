<?php

namespace App\Models;

use App\Helpers\BlockchainHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $user_id
 * @property int $blockchain_id
 * @property string $address
 * @property float $balance
 * @property \Carbon\Carbon $fetched_at
 * @property \Carbon\Carbon $fetching_scheduled_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property Blockchain $blockchain
 * @property User $user
 * @property \Illuminate\Support\Collection<BlockchainAsset> $blockchainAssets
 * @property \Illuminate\Support\Collection<\App\Models\BlockchainTransaction> $blockchainTransactions
 */
class BlockchainAccount extends Model
{
    protected $casts = [
        'fetched_at' => 'datetime',
        'fetching_scheduled_at' => 'datetime',
    ];


    public static function boot()
    {
        parent::boot();

        static::deleting(function (self $item) {
            $item->blockchainTransactions()->cascadeDelete();
            $item->blockchainAssets()->cascadeDelete();
        });
    }


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function blockchain(): BelongsTo
    {
        return $this->belongsTo(Blockchain::class);
    }


    public function blockchainTransactions(): HasMany
    {
        return $this->hasMany(BlockchainTransaction::class);
    }


    /**
     * @return HasMany
     */
    public function blockchainAssets(): HasMany
    {
        return $this->hasMany(BlockchainAsset::class);
    }


    public function getName(): string
    {
        return $this->blockchain->getName().": ".$this->address;
    }


    /**
     * @param string $currency
     * @return float
     */
    public function getBalanceSum(string $currency = "USD"): float
    {
        $sum = 0;

        $this->blockchainAssets->each(function(BlockchainAsset $asset) use (&$sum, $currency) {
            if($asset->balance) {
                $sum+= $asset->convertTo($currency);
            }
        });

        return $sum;
    }


    public function fetchApi()
    {
        /**
         * @var \App\Blockchains\BscScanBlockChainApi $api
         */
        // Create api
        $class = "\\App\\Blockchains\\".$this->blockchain->class;
        $api = $class::make($this);
        $now = now();

        // Start transaction
        \DB::beginTransaction();

        // Get Balance
        $result = $api->getBalances();
        // Clear old vals
        $this->blockchainAssets()->cascadeDelete();
        \App\Models\BlockchainAsset::insert($result);

        // Get Transactions
        $userId = $this->user_id;
        $blockchainAccountId = $this->id;
        $lastEntry = $this->blockchainTransactions()
            ->orderBy("time_stamp", "desc")
            ->first();
        $lastTimeStamp = $lastEntry?->time_stamp; // 1639314121
        $transactions = $api->getTransactionsSince($lastTimeStamp + 1);
        $data = collect($transactions)->map(function ($item) use ($blockchainAccountId, $userId) {
            return [
                "blockchain_account_id" => $blockchainAccountId,
                "user_id" => $userId,
                "block_hash" => $item["blockHash"],
                "block_number" => $item["blockNumber"],
                "confirmations" => $item["confirmations"],
                "contract_address" => $item["contractAddress"],
                "cumulative_gas_used" => BlockchainHelper::convertToDecimalString($item["cumulativeGasUsed"]),
                "from" => $item["from"],
                "gas" => BlockchainHelper::convertToDecimalString($item["gas"]),
                "gas_price" => BlockchainHelper::convertToDecimalString($item["gasPrice"]),
                "gas_used" => BlockchainHelper::convertToDecimalString($item["gasUsed"]),
                "hash" => $item["hash"],
                "input" => $item["input"],
                "is_error" => $item["isError"],
                "nonce" => $item["nonce"],
                "time_stamp" => $item["timeStamp"],
                "to" => $item["to"],
                "transaction_index" => $item["transactionIndex"],
                "txreceipt_status" => $item["txreceipt_status"],
                "value" => BlockchainHelper::convertToDecimalString($item["value"]),
            ];
        });
        BlockchainTransaction::insert($data->toArray());

        // Save fetch staties
        $this->fetched_at = $now;
        $this->fetching_scheduled_at = null;
        $this->save();

        // End Transaction
        \DB::commit();

        return $this;
    }
}
