<?php

namespace App\CaravelAdmin\Resources\UserAccountType;

use WebCaravel\Admin\Resources\Resource;
use App\Models\UserAccountType;


class UserAccountTypeResource extends Resource
{
    protected string $model = UserAccountType::class;
    protected string $icon = "fas-user-circle";


    public function label(): string
    {
        return __("Account Type");
    }


    public function labelPlural(): string
    {
        return __("Account Types");
    }
}
