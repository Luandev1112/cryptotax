<?php

namespace App\CaravelAdmin\Resources\TaxAdvisor;

use WebCaravel\Admin\Resources\ResourceTable;
use App\Models\User;
use App\Models\UserAccountType;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class TaxAdvisorTable extends ResourceTable
{
    protected function getTableQuery(): Builder
    {
        return User::query()->where("user_account_type_id", UserAccountType::TYPE_TAX_ADVISOR);
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
        ];
    }
}
