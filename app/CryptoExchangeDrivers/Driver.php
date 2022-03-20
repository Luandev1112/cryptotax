<?php

namespace App\CryptoExchangeDrivers;

use App\Models\CryptoCurrency;
use App\Models\CryptoExchangeAccount;
use App\Models\CryptoExchangeAsset;
use App\Models\CryptoExchangeTransaction;
use Carbon\Carbon;

abstract class Driver
{
    protected CryptoExchangeAccount $exchangeAccount;
    protected $api;

    /**
     * @param \App\Models\CryptoExchangeAccount $exchangeAccount
     * @return static
     */
    public static function make(CryptoExchangeAccount $exchangeAccount): self
    {
        $obj = new static();
        $obj->exchangeAccount = $exchangeAccount;
        $obj->connect();

        return $obj;
    }

    /**
     * @return $this
     */
    abstract protected function connect(): self;

    /**
     * @return bool
     */
    public function checkRequiredCredentials(): bool
    {
        return $this->api->check_required_credentials();
    }

    /**
     * @return array
     */
    public function getRequiredCredentials(): array
    {
        return $this->api->requiredCredentials;
    }

    /**
     * @return $this
     */
    public function updateTransactions(): self
    {
        // Get Balance
        $balances = $this->fetchBalances();

        // Get transaction data
        $since = $this->exchangeAccount->fetched_at ?: Carbon::create(2010, 1, 1);
        $data = $this->fetchTransactions(null, $since);

        // Save it
        $this->saveTransactions($data, now(), $balances["total"]);

        return $this;
    }


    /**
     * @return \ccxt\Exchange
     */
    public function getApi()
    {
        return $this->api;
    }


    /**
     * @param array $data
     * @param \Carbon\Carbon $timestamp
     * @param array|null $balances
     * @return $this
     */
    protected function saveTransactions(array $data, Carbon $timestamp, ?array $balances = null): self
    {
        $account = $this->exchangeAccount;
        $data = collect($data)->map(function ($item){
            return $this->mapFetchedTransactions($item);
        })->toArray();

        \DB::transaction(function() use ($account, $data, $balances, $timestamp) {
            // Insert data
            if($data) CryptoExchangeTransaction::insert($data);

            // Save balances
            $this->saveBalances($balances);
        });

        return $this;
    }


    protected function saveBalances(?array $balances = null)
    {
        if(!is_null($balances)) {
            $account = $this->exchangeAccount;
            $account->cryptoExchangeAssets()->delete();
            foreach($balances AS $key => $val) {
                $currency = CryptoCurrency::findByShortName($key);
                if($currency) {
                    $currency = $currency->id;
                }
                else {
                    $currency = 0;
                    logger("Missing crypto currency " . $key);
                }

                CryptoExchangeAsset::make([
                    "crypto_exchange_account_id" => $account->id,
                    "crypto_currency_id" => $currency,
                    "balance" => $val
                ])->save();
            }
        }
    }




    /**
     * @param array $data
     * @return array
     */
    protected function mapFetchedTransactions(array $data)
    {
        $info = \Arr::get($data, "info");

        return [
            "crypto_exchange_account_id" => $this->exchangeAccount->id,
            "external_id" => $data["id"],
            "order" => $data["order"],
            "executed_at" => $data["timestamp"],
            "symbol" => $data["symbol"],
            "type" => $data["type"],
            "side" => $data["side"],
            "taker_or_maker" => $data["takerOrMaker"],
            "price" => $data["price"],
            "amount" => $data["amount"],
            "cost" => $data["cost"],
            "fee_cost" => \Arr::get($data, "fee.cost"),
            "fee_rate" => \Arr::get($data, "fee.rate"),
            "fee_currency" => \Arr::get($data, "fee.currency"),
            "data" => $info ? json_encode($info) : null,
        ];
    }

    /**
     * See https://docs.ccxt.com/en/latest/manual.html#balance-structure
     *
     * @return mixed
     */
    public function fetchBalances()
    {
        // return $this->api->fetchBalance([
        //     "type" => "main"
        // ]);
        return $this->api->fetch_balance();
    }

    /**
     * @return array
     */
    protected function getCredentials() : array
    {
        return $this->exchangeAccount->credentials ?: [];
    }

    /**
     * @param string|null $symbol
     * @param Carbon|null $since
     * @return array
     */
    public function fetchTransactions(?string $symbol = null, ?Carbon $since = null): array
    {
        return $this->api->fetch_my_trades(
            $symbol,
            $since ? $since->timestamp * 1000 : null
        );
    }

    public function getMachingSymbols($balances) {
        $all_matching_symbols = array();
        $this->api->load_markets();
        foreach ($balances as $currency_code => $value) {
            // get all related markets with
            //   either base currency === currency code from the balance structure
            //      or quote currency === currency code from the balance structure
            $matching_markets = array_filter(array_values($this->api->markets), function ($market) use ($currency_code) {
                return ($market['base'] === $currency_code) || ($market['quote'] === $currency_code);
            });
            $matching_symbols = $this->api->pluck($matching_markets, 'symbol');
            $all_matching_symbols = array_merge ($all_matching_symbols, $matching_symbols);
        }
        $unique_symbols = $this->api->unique($all_matching_symbols);
        return $unique_symbols;
    }

    public function setInterval($f, $milliseconds)
    {
        $seconds=(int)$milliseconds/1000;
        while(true)
        {
            $f();
            sleep($seconds);
        }
    }

    public function fetchAllTransactions($symbol = null, $balances){
        $from_id = '0';
        $params = array('fromId' => $from_id, 'limit' => 20);
        $previous_from_id = $from_id;
        $all_trades = array();
        while (true) {
            $trades = $this->api->fetch_my_trades($symbol, null, null, $params);
            if (count($trades) > 0) {
                // Save it
                $this->saveTransactions($trades, now(), $balances["total"]);

                $last_trade = $trades[count($trades) - 1];
                if ($last_trade['id'] == $previous_from_id) {
                    break;
                } else {
                    $params['fromId'] = $last_trade['id'];
                    $previous_from_id = $last_trade['id'];
                    // $all_trades = array_merge ($all_trades, $trades);
                }
            } else {
                break;
            }
        }
        // return $all_trades;
    }
}
