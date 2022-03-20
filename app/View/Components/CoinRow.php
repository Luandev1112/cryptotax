<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CoinRow extends Component
{
    public string $name;
    public ?int $transactions;
    public ?float $price;
    public ?float $amount;

    public function __construct($coin = [], ?string $name = null, ?int $transactions = null, ?float $price = null, ?float $amount = null)
    {
        // Coin as array/object
        if($coin) {
            $name = $name ?: data_get($coin, "name");
            $transactions = $transactions ?: data_get($coin, "transactions");
            $price = $price ?: data_get($coin, "price");
            $amount = $amount ?: data_get($coin, "amount");
        }

        // Set values
        $this->name = $name;
        $this->transactions = $transactions;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function render()
    {
        return view("components.coin-row");
    }
}
