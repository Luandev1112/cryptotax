<?php

namespace App\CaravelAdmin\Resources\BackendUser;

use WebCaravel\Admin\Resources\ResourceTable;
use App\Models\User;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class BackendUserTable extends ResourceTable
{
    public string $resourceClass = BackendUserResource::class;


    protected function getTableQuery(): Builder
    {
        return User::query()->whereIn("user_account_type_id", $this->resource->typesArray);
    }


    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make("name")
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make("email")
                ->label("E-Mail")
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make("userAccountType.name")
                ->label("Type"),
        ];
    }
}
