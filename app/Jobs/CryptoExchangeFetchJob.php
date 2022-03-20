<?php

namespace App\Jobs;

use App\Models\CryptoExchangeAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CryptoExchangeFetchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 240;
    public CryptoExchangeAccount $account;


    public function __construct(CryptoExchangeAccount $account)
    {
        $this->account = $account;
    }


    public function handle()
    {
        $api = $this->account->getApi();
        $api->updateTransactions();
    }
}
