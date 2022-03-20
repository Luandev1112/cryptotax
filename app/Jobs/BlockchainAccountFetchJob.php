<?php

namespace App\Jobs;

use App\Models\BlockchainAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BlockchainAccountFetchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 240;
    public BlockchainAccount $blockchainAccount;


    public function __construct(BlockchainAccount $blockchain)
    {
        $this->blockchainAccount = $blockchain;
    }


    public function handle()
    {
        $this->blockchainAccount->fetchApi();
    }
}
