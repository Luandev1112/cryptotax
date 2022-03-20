<?php

namespace App\CryptoExchangeDrivers;



use Carbon\Carbon;

/**
 * Class KucoinDriver
 *
 * @package App\CryptoExchangeDrivers
 *
 * @property \ccxt\kucoin $api
 */
class KucoinDriver extends Driver
{

    /**
     * @return $this
     * @throws \Exception
     */
    protected function connect(): self
    {
        date_default_timezone_set ('UTC'); 
        $credentials = $this->getCredentials();
        $this->api = new \ccxt\kucoin([
            "apiKey" => \Arr::get($credentials, "apiKey"),
            "secret" => \Arr::get($credentials, "secret"),
            "password" => \Arr::get($credentials, "password"),
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
       
        for($i = 0; $i < 30; $i ++)
        {
            $this->fetchCointransactions();
        }
         return $this;

    }

    public function fetchCointransactions($symbol_index = 0)
    {
        $account = $this->exchangeAccount;
        $since = $account->fetched_at ? $account->fetched_at : Carbon::create(2019, 02, 18);
        $now = now();
        $counter = 0;
        $result = array(
            'status' => 'pending',
            'exchange' => 'KuCoin',
            'data_index' => $symbol_index
        );
        while(true) {
            $data = $this->fetchTransactions(null, $since);
            if(count($data) > 0)
            {
                $this->saveTransactions($data, $since);
            }
            // Add a week aka 7 days and increment counter
            $since->addDays(7);

            // Update fetched_at
            $account->fetched_at = $since;
            $account->save();

            if(!$since->isPast())
            {
                $account->fetched_at = $now;
                $account->fetching_scheduled_at = null;
                $account->save();
                $result['status'] = 'finish';
                break;
            }
            $counter++;
            // Return result because of Request Limit of 9 times/3s
            if($counter !== 0 && $counter % 7 === 0) { // Modulo 7 instead of 9, just to make sure
                $result['status'] = 'pending';
                sleep(3);
                break;
            }
        }
        return $result;
    }
}
