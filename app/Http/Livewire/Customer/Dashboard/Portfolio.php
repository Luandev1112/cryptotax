<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;

class Portfolio extends Component
{
    public function render()
    {
        $portfolio = [
            [
                'id' => 1, 'icon' => 'bitcoin', 'name' => 'Bitcoin', 'type' => 'BIT', 'lineColor' =>'#FF0303', 'price' => '$69,729.64',
                'holding' => [ 'btc' => '0.1002365 BTC', 'usd' => '4,886.64' ], 'percentage' => 56,
                'pnl' => [ 'price' => '$89,402.19', 'percent' => 10 ], 
                'child' => [
                    [
                        'id' => 3, 'icon' => 'bitcoin', 'name' => 'Bitcoin', 'type' => 'BIT', 'lineColor' =>'#FF0303', 'price' => '$69,729.64',
                        'holding' => [ 'btc' => '0.1002365 BTC', 'usd' => '4,886.64' ], 'percentage' => 56,
                        'pnl' => [ 'price' => '$89,402.19', 'percent' => 10 ]
                    ]
                ]
            ],
            [
                'id' => 2, 'icon' => 'bitcoin', 'name' => 'Bitcoin', 'type' => 'BIT', 'lineColor' =>'#1DB737', 'price' => '$69,729.64',
                'holding' => [ 'btc' => '0.1002365 BTC', 'usd' => '4,886.64' ], 'percentage' => 56,
                'pnl' => [ 'price' => '$89,402.19', 'percent' => 10 ], 
                'child' => []
            ]
        ];
        return view('livewire.customer.dashboard.portfolio', [
            'portfolio' => $portfolio
        ]);
    }
}
