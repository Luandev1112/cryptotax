<?php

namespace App\Blockchains;

use App\Models\BlockchainAccount;
use GuzzleHttp\Client;

abstract class BlockChainApi
{
    protected BlockchainAccount $account;
    protected array $extraParams = [];
    protected string $baseUrl;


    /**
     * @param \App\Models\BlockchainAccount|null $account
     * @return static
     */
    public static function make(BlockchainAccount $account = null): self
    {
        $obj = new static();
        $obj->setAccount($account);

        return $obj;
    }


    public function getTransactionsSince(int $startTimeStamp = 0): array
    {
        return $this->getTransactions([
            "starttimestamp" => $startTimeStamp,
            "sort" => "asc"
        ]);
    }


    public function getTransactions(array $params = []): array
    {
        // Cronos: Will get only 10.000 transaction - need to use paging if you need more - see https://cronos.crypto.org/explorer/api-docs#account-txlist
        $result = $this->callAccount("txlist", true, $params);

        return $result["result"] ?: [];
    }


    public function getBalances(): array
    {
        $result = $this->callAccount("tokenlist", true);
        $array = [];

        foreach($result["result"] AS $row) {
            $currency = \App\Models\CryptoCurrency::findByShortName($row["symbol"]);

            $array[]= [
                "blockchain_account_id" => $this->account->id,
                "crypto_currency_id" => $currency ? $currency->id : 0,
                "balance" => $row["balance"] / 1000000000000000000,
                "contract_address" => $row["contractAddress"],
                "symbol" => $row["symbol"],
            ];
        }

        return $array;
    }


    protected function callAccount(string $action, bool $includeAddress = false, array $params = []): array
    {
        if ($includeAddress) {
            $params["address"] = $this->account->address;
        }

        $result = $this->call('account', $action, $params);

        return $result;
    }


    protected function call(string $module, string $action, array $params = []): array
    {
        // Preparing request
        $client = new Client();
        $params = array_merge([
            "module" => $module,
            "action" => $action,
        ], $this->extraParams, $params);

        // Request
        $response = $client->request('GET', $this->baseUrl."?".http_build_query($params), [
            'verify' => false,
        ]);

        return json_decode($response->getBody(), true);
    }


    /**
     * @return \App\Models\BlockchainAccount
     */
    public function getAccount(): BlockchainAccount
    {
        return $this->account;
    }


    /**
     * @param \App\Models\BlockchainAccount $account
     * @return BlockChainApi
     */
    public function setAccount(BlockchainAccount $account): BlockChainApi
    {
        $this->account = $account;

        return $this;
    }
}
