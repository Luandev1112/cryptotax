<?php

namespace App\CaravelAdmin\Resources\CryptoExchange;

use WebCaravel\Admin\Resources\Resource;
use App\Models\CryptoExchange;


class CryptoExchangeResource extends Resource
{
    protected string $model = CryptoExchange::class;
    protected string $icon = "fas-shield-alt";


    public function label(): string
    {
        return __("Crypo exchange");
    }


    public function labelPlural(): string
    {
        return __("Crypo exchanges");
    }
}
