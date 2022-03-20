<?php

namespace App\CaravelAdmin\Resources\UserCreditAction;

use WebCaravel\Admin\Resources\Resource;
use App\Models\UserCreditAction;


class UserCreditActionResource extends Resource
{
    protected string $model = UserCreditAction::class;
    protected string $icon = "fas-money-bill-alt";


    public function label(): string
    {
        return __("Credit action");
    }


    public function labelPlural(): string
    {
        return __("Credit actions");
    }
}
