<?php

namespace App\CaravelAdmin\Resources\UserAccountType;

use WebCaravel\Admin\Resources\ResourceForm;
use WebCaravel\Admin\Forms\SidebarLayout;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;


class UserAccountTypeForm extends ResourceForm
{
    public function getFormSchema(): array
    {
        return SidebarLayout::make()
            ->addTab([
                TextInput::make('name')
                    ->label(__("Name"))
                    ->required()
                    ->columnSpan(2),
                TextInput::make('price_per_year')
                    ->label(__("Price per year"))
                    ->placeholder("Price per year")
                    ->placeholder("Leave empty if its for free")
                    ->postfix("$")
                    ->numeric(),
                TextInput::make('price_per_month')
                    ->label(__("Price per month"))
                    ->placeholder("Price per month")
                    ->placeholder("Leave empty if its for free")
                    ->postfix("$")
                    ->numeric(),
                TextInput::make('max_backups')
                    ->label(__("Max. backups"))
                    ->placeholder("Leave empty for unlimited")
                    ->numeric()
                    ->nullable(true),
                TextInput::make('duration_in_months')
                    ->label(__("Duration"))
                    ->placeholder("Leave empty for unlimited")
                    ->postfix("months")
                    ->numeric()
                    ->nullable(true),
                TextInput::make('max_csv_upload')
                    ->label(__("Max. CSV Uploads"))
                    ->numeric()
                    ->placeholder("Leave empty for unlimited")
                    ->postfix("MB")
                    ->nullable(true),
                Toggle::make("is_customer")
                    ->label(__("Is customer")),
                Toggle::make("active")
                    ->label(__("Active")),
            ])
            ->toArray();
    }
}
