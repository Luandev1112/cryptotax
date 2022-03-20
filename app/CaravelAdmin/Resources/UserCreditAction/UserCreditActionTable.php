<?php

namespace App\CaravelAdmin\Resources\UserCreditAction;

use WebCaravel\Admin\Resources\ResourceTable;
use Filament\Tables\Columns\TextColumn;

class UserCreditActionTable extends ResourceTable
{
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make("action_code")
                ->sortable()
                ->searchable(),
            TextColumn::make("name")
                ->sortable()
                ->searchable(),
            TextColumn::make("name_public")
                ->label("Name (Public)")
                ->sortable()
                ->searchable(),
            TextColumn::make("value")
                ->label("Credits")
                ->sortable(),
            TextColumn::make('valid_from')
                ->dateTime()
                ->sortable(),
            TextColumn::make('valid_till')
                ->dateTime()
                ->sortable()

        ];
    }


    protected function getTableFilters(): array
    {
        return [

        ];
    }
}
