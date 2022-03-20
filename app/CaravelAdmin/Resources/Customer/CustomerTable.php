<?php

namespace App\CaravelAdmin\Resources\Customer;

use WebCaravel\Admin\Resources\ResourceTable;
use App\CaravelAdmin\Resources\UserAccountType\UserAccountTypeResource;
use App\Models\User;
use App\Tables\Columns\BelongsToColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class CustomerTable extends ResourceTable
{
    public string $resourceClass = CustomerResource::class;


    protected function getTableQuery(): Builder
    {
        return User::query()->customersOnly();
    }


    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make("name")
                ->sortable()
                ->searchable(),
            BelongsToColumn::make("userAccountType.name")
                ->resource(UserAccountTypeResource::class),
            Tables\Columns\TextColumn::make("credits")
                ->sortable(),
            Tables\Columns\TextColumn::make("email")
                ->label("E-Mail")
                ->searchable()
                ->sortable(),
        ];
    }
}
