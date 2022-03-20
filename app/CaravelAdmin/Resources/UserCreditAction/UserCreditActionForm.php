<?php

namespace App\CaravelAdmin\Resources\UserCreditAction;

use WebCaravel\Admin\Resources\ResourceForm;
use WebCaravel\Admin\Forms\SidebarLayout;
use App\Services\CreditCodeService;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;


class UserCreditActionForm extends ResourceForm
{
    public function getFormSchema(): array
    {
        return SidebarLayout::make()
            ->addTab([
                TextInput::make('name')
                    ->label(__("Name"))
                    ->required(),
                TextInput::make('name_public')
                    ->label(__("Name Public"))
                    ->required(),
                Forms\Components\Select::make("action_code")
                    ->options(CreditCodeService::allActionsForSelect())
                    ->label("Action"),
                TextInput::make('value')
                    ->label(__("Credits (negativ = cost; positiv = reward)"))
                    ->postfix("Credits")
                    ->nullable(true)
                    ->numeric(),
                DateTimePicker::make('valid_from')
                    ->withoutSeconds()
                    ->nullable(),
                DateTimePicker::make('valid_till')
                    ->withoutSeconds()
                    ->placeholder('Leave empty if it has no end (yet)')
                    ->nullable(),
            ])
            ->toArray();
    }
}
