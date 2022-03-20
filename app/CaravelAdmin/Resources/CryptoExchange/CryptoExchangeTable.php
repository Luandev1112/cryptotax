<?php

namespace App\CaravelAdmin\Resources\CryptoExchange;

use WebCaravel\Admin\Resources\ResourceTable;
use Filament\Tables;


class CryptoExchangeTable extends ResourceTable
{
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make("name")
                ->sortable()
                ->searchable(),
            Tables\Columns\BooleanColumn::make("active")
                ->label(__("Status"))
                ->sortable()
        ];
    }
}
