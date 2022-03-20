<?php

namespace App\CaravelAdmin\Resources\TaxAdvisor;

use WebCaravel\Admin\Resources\Resource;
use App\Models\User;


class TaxAdvisorResource extends Resource
{
    protected string $model = User::class;
    protected string $icon = "advisor";


    public function label(): string
    {
        return __("Tax Advisor");
    }


    public function labelPlural(): string
    {
        return __("Tax Advisors");
    }
}
