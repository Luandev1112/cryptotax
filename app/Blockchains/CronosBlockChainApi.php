<?php

namespace App\Blockchains;

class CronosBlockChainApi extends BlockChainApi
{
    // See https://cronos.crypto.org/explorer/api-docs

    public function __construct()
    {
        $this->baseUrl = config("crypto.blockchains.cronos.url");
    }
}
