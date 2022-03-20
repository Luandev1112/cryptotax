<?php

namespace App\CaravelAdmin\Resources\AffiliateUser;

use WebCaravel\Admin\Resources\ResourceForm;
use WebCaravel\Admin\Forms\SidebarLayout;
use Filament\Forms;


class AffiliateUserForm extends ResourceForm
{
    protected function getFormSchema(): array
    {
        return SidebarLayout::make()
            ->addTab([
                Forms\Components\TextInput::make('name')
                    ->label(__("Name"))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),
                Forms\Components\BelongsToSelect::make('user_account_type_id')
                    ->required()
                    ->relationship("userAccountType", "name")
                    ->label("Type"),
            ])
            ->toArray();
    }
}
