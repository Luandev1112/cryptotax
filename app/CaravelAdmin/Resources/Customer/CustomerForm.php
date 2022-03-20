<?php

namespace App\CaravelAdmin\Resources\Customer;

use App\Models\User;
use App\Models\UserCreditLog;
use WebCaravel\Admin\Resources\ResourceForm;
use App\CaravelAdmin\Resources\UserCreditLog\UserCreditLogResource;
use WebCaravel\Admin\Forms\Components\HasManyRelationField;
use WebCaravel\Admin\Forms\SidebarLayout;
use Filament\Forms;

use function moneyFormat;

class CustomerForm extends ResourceForm
{
    protected function getFormSchema(): array
    {
        return SidebarLayout::make()
            ->addTab(Forms\Components\Tabs\Tab::make(__('General'))->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__("Name"))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),
            ]))
            ->addTab(Forms\Components\Tabs\Tab::make("Credit Logs")->schema([
                HasManyRelationField::make('creditLogs')
                    ->resource(UserCreditLogResource::make())
            ])->visible(fn($record) => $record->exists && auth()->user()->can("viewAny", UserCreditLog::class)))
            ->addCard([
                Forms\Components\Placeholder::make("id")->label(__("ID"))
                    ->content(fn ($record): string => $record ? $record->id : '-'),
                Forms\Components\Placeholder::make("credits")->label(__("Credits"))
                    ->content(fn ($record): string => moneyFormat($record->credits)),
                Forms\Components\Placeholder::make("created_at")->label(__("Registered at"))
                    ->content(fn ($record): string => $record ? $record->created_at : '-'),
                Forms\Components\Placeholder::make("account_type_id")->label(__("Account type"))
                    ->content(fn (User $record): string => $record->userAccountType->getName()),
            ])
            ->toArray();
    }
}
