<?php

namespace App\CaravelAdmin\Resources\BackendUser;

use WebCaravel\Admin\Resources\ResourceForm;
use WebCaravel\Admin\Forms\SidebarLayout;
use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;


class BackendUserForm extends ResourceForm
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
                    ->relationship("userAccountType", "name", fn (Builder $query) => $query->whereIn("id", $this->resource->typesArray))
                    ->label("Type"),
            ])
            ->toArray();
    }
}
