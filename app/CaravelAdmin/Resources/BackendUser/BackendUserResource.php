<?php

namespace App\CaravelAdmin\Resources\BackendUser;

use WebCaravel\Admin\Resources\Resource;
use App\Models\User;
use App\Models\UserAccountType;


class BackendUserResource extends Resource
{
    protected string $model = User::class;
    protected string $icon = "fas-user-cog";
    public array $typesArray =  [
        UserAccountType::TYPE_ADMIN,
        UserAccountType::TYPE_EDITOR,
        UserAccountType::TYPE_SUPPORT,
    ];


    public function label(): string
    {
        return __("Backend User");
    }


    public function labelPlural(): string
    {
        return __("Backend Users");
    }
}
