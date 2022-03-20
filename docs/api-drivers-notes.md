# API Drivers Notes

## Kucoin

### Ledgers

Example of how to fetch all ledgers from Kucoin

```php
use KuCoin\SDK\Auth;
use KuCoin\SDK\PrivateApi\Account;

$auth = new Auth(
    \Arr::get($credentials, "key"),
    \Arr::get($credentials, "secret"),
    \Arr::get($credentials, "passphrase"),
    Auth::API_KEY_VERSION_V2
);
$account = new Account($auth);

for($i = 0; $i < 30; $i++) {
    $time = now()->subDays($i);
    $res = $account->getLedgersV2([
        "endAt" => $time->timestamp * 1000
    ]);

    if($res && $res["items"]) {
        echo "<h2>" . $time->format("Y-m-d") . "</h2><pre>";
        print_r($res);
        echo "</pre>";
    }

    if($i % 15 == 0) {
        sleep(4);
    }
}
```

### Fetch trades

```php
$api = new \ccxt\kucoin([
    "apiKey" => \Arr::get($credentials, "key"),
    "secret" => \Arr::get($credentials, "secret"),
    "password" => \Arr::get($credentials, "passphrase"),
]);
for($i = 0; $i < 30; $i = $i+7) {
    $date = now()->subDays($i);

    echo "<h2>" . $date . "</h2>";
    dump($api->fetch_my_trades(null, null, null, [
        "endAt" => $date->timestamp * 1000
    ]));
}
```


## HitBTC


### Fetch trades

```php
// Hitbtc
$api = new \ccxt\hitbtc3([
    "apiKey" => "XnDHZ6n5ernQ6WuGy5iMuqKqDFlSyLdB",
    "secret" => "Vbxrl5JX-uIcS8RtF6r4lzoRNM2fLXdX",
]);
dd($api->fetch_my_trades());
```
