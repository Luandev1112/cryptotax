<?php

namespace App\Blockchains;

class BscScanBlockChainApi extends BlockChainApi
{
    // See https://docs.bscscan.com/api-endpoints/accounts

    public function __construct()
    {
        $this->baseUrl = config("crypto.blockchains.bscscan.url");
        $this->extraParams["apiKey"] = config("crypto.blockchains.bscscan.apiKey");
    }

    public function getBalances(): array
    {
        return [];
    }
}
