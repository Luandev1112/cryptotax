<?php

namespace App\Http\Livewire\Blockchain;

use App\Models\BlockchainTransaction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use WireUi\Traits\Actions;

class BlockchainTable extends Component implements Tables\Contracts\HasTable
{
    use Actions;
    use Tables\Concerns\InteractsWithTable;

    protected $listeners = ['blockchainTable.updateTable' => '$refresh'];
    public ?int $updated_at = null;


    protected function getTableQuery(): Builder
    {
        return BlockchainTransaction::query()
            ->where("user_id", auth()->user()->id);
    }


    protected function getTableFilters(): array
    {
        $blockchainOptions = auth()->user()->blockchainAccounts->pluck("address", "id");
        return [
            SelectFilter::make('blockchain_id')
                ->label(__("Blockchain"))
                ->query(function (Builder $query, array $data): Builder {
                    if(! empty($data["value"])) {
                        $id = $data["value"];
                        $query->where("blockchain_account_id", $id);
                    }

                    return $query;
                })
                ->options($blockchainOptions),
        ];
    }


    protected function getTableColumns(): array
    {
        return [
            TextColumn::make("confirmations")->sortable(true),
            TextColumn::make("value")->sortable(true),
            TextColumn::make("contract_address")->sortable(true),
            TextColumn::make("cumulative_gas_used")->sortable(true),
            TextColumn::make("from")->sortable(true),
            TextColumn::make("gas")->sortable(true),
            TextColumn::make("gas_price")->sortable(true),
            TextColumn::make("gas_used")->sortable(true),
            TextColumn::make("hash")->sortable(true),
            TextColumn::make("is_error")->sortable(true),
            TextColumn::make("nonce")->sortable(true),
            TextColumn::make("time_stamp")->sortable(true)->date("Y-m-d H:i:s"),
            TextColumn::make("to")->sortable(true),
            TextColumn::make("transaction_index")->sortable(true),
            TextColumn::make("txreceipt_status")->sortable(true),
            TextColumn::make("blockchainAccount.address")->sortable(true),
            TextColumn::make("block_hash")->sortable(true),
            TextColumn::make("block_number")->searchable(true),
            TextColumn::make("input")->sortable(true),
        ];
    }


    public function updateTable()
    {
        $this->notification()->success("Refresh");
        $this->updated_at = now();
    }


    public function render()
    {
        return view('livewire.blockchain.blockchain-table');
    }
}
