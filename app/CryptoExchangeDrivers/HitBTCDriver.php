<?php

namespace App\CryptoExchangeDrivers;

use Carbon\Carbon;


/**
 * Class HitBTC
 *
 * @package App\CryptoExchangeDrivers
 *
 * @property \ccxt\hitbtc3 $api
 */
class HitBTCDriver extends Driver
{

    /**
     * @return $this
     * @throws \Exception
     */
    protected function connect(): self
    {
        date_default_timezone_set ('UTC'); 
        $credentials = $this->getCredentials();
        $this->api = new \ccxt\hitbtc([
            "apiKey" => \Arr::get($credentials, "apiKey"),
            "secret" => \Arr::get($credentials, "secret"),
            'verbose' => false,
            'enableRateLimit' => true,
            'rateLimit' => 100, // unified exchange property
            'options' => array(
                'adjustForTimeDifference' => true, // exchange-specific option
                'recvWindow'=> 60000,
            ),
        ]);
        return $this;
    }

    public function getCoins()
    {
        $main_balances = $this->api->fetch_balance([
            "type" => "main"
        ]);
        $main_total = $main_balances['total'];
        
        $trade_balances = $this->api->fetchBalance([
            "type" => "trade"
        ]);
        $trade_total = $trade_balances['total'];

        $total = array();
        foreach (array_keys($main_total + $trade_total) as $key) {
            $sum = (isset($main_total[$key]) ? $main_total[$key] : 0) + (isset($trade_total[$key]) ? $trade_total[$key] : 0);
            if($sum > 0)
                $total[$key] = $sum;
        }
        return $total;
    }

    /**
     * @return $this
     * @throws \ccxt\ExchangeError
     */
    public function updateTransactions(): self
    {
        // Balance
        $balances = $this->getCoins();
        $this->saveBalances($balances);  
        return $this;
    }

    public function fetchCointransactions($symbol_index = 0)
    {
        $account = $this->exchangeAccount;
        $now = now();
        $counter = 0;
        $result = array(
            'status' => 'pending',
            'exchange' => 'HitBTC',
            'data_index' => $symbol_index
        );
        $since = $account->fetched_at ? $account->fetched_at : null;
        $timestamp = $since ? $since->timestamp : null;
        $data = $this->api->fetch_my_trades(null, $timestamp * 1000);
        if(count($data) > 0)
        {
            $this->saveTransactions($data, $now);
        }
        $account->fetched_at = $now;
        $account->save();
        $result['status'] = 'finish';
        return $result;
    }
}
