<?php

namespace App\CaravelAdmin\Resources\CryptoExchange;

use WebCaravel\Admin\Resources\ResourceForm;
use WebCaravel\Admin\Forms\SidebarLayout;
use Filament\Forms;


class CryptoExchangeForm extends ResourceForm
{


    public function getFormSchema(): array
    {
        return SidebarLayout::make()
            ->addTab([
                Forms\Components\TextInput::make('name')
                    ->label(__("Name"))
                    ->required(),
                Forms\Components\Toggle::make("active")
                    ->label(__("Status"))
            ])
            ->toArray();
    }
}
