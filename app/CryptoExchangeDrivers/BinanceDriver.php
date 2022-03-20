<?php

namespace App\CryptoExchangeDrivers;

use Carbon\Carbon;

/**
 * Class BinanceDriver
 *
 * @package App\CryptoExchangeDrivers
 *
 * @property \ccxt\binance $api
 */
class BinanceDriver extends Driver
{

    /**
     * @return $this
     * @throws \Exception
     */
    protected function connect(): self
    {
        date_default_timezone_set ('UTC'); 
        $credentials = $this->getCredentials();
        $this->api = new \ccxt\binance([
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

    // Get coins balances from BinanceDriver crypto exchange 
    public function getCoins()
    {
        $this->api->load_markets();
        $main_balances = $this->api->fetch_balance();
        $total_balances = $main_balances['total'];
        $balances = array();
        foreach($total_balances as $type => $value)
        {
            if($value > 0)
            {
                $pos = strpos($type, 'LD');
                if(gettype($pos) == 'integer' && $pos == 0)
                {
                    $type = str_replace('LD', '', $type);
                    if(isset($balances->$type) && $balances->$type > 0)
                    {
                        unset($balances->$type);
                    }
                }
                $balances[$type] = $value;
            }
        }
        return $balances;
    }

    /**
     * @return $this
     * @throws \ccxt\ExchangeError
     */
    public function updateTransactions(): self
    {
        $account = $this->exchangeAccount;

        // Balance
        $balances = $this->getCoins();
        $this->saveBalances($balances);
        return $this;
    }

    public function fetchCointransactions($symbol_index = 0)
    {
        $account = $this->exchangeAccount;
        $balances = $this->getCoins();
        $unique_symbols = $this->getMachingSymbols($balances);

        // dd($unique_symbols);
        $since = $account->fetched_at ? $account->fetched_at : null;
        $now = now();
        $result = array(
            'status' => 'pending',
            'exchange' => 'Binance',
            'data_index' => $symbol_index
        );

        $symbol = $unique_symbols[$symbol_index];

        $from_id = '0';
        $params = array('fromId' => $from_id, 'limit' => 20);
        $previous_from_id = $from_id;
        while (true) {
            $milli_time = $since ? $since->timestamp * 1000 : null;
            $trades = $this->api->fetch_my_trades($symbol, $milli_time, null, $params);
            if (count($trades) > 0) {
                // Save it
                $this->saveTransactions($trades, now(), $balances);

                $last_trade = $trades[count($trades) - 1];
                if ($last_trade['id'] == $previous_from_id) {
                    break;
                } else {
                    $params['fromId'] = $last_trade['id'];
                    $previous_from_id = $last_trade['id'];
                }
            } else {
                break;
            }
        }

        if($symbol_index == count($unique_symbols) - 1)
        {
            $account->fetched_at = $now;
            $account->fetching_scheduled_at = null;
            $account->save();
            $result['status'] = 'finish';
        }else{
            $result['status'] = 'pending';
        }
        $result['data_index'] = $symbol_index + 1;
        return $result;
    }
}