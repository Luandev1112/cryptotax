<?php

namespace App\Http\Livewire\Customer\Account;

use Livewire\Component;

use App\Jobs\CryptoExchangeFetchJob;
use App\Models\CryptoExchange;
use App\Models\CryptoExchangeAccount;
use App\Jobs\BlockchainAccountFetchJob;
use App\Models\BlockchainAccount;
use Filament\Forms;
use WireUi\Traits\Actions;

use ccxt;

class Accounts extends Component implements Forms\Contracts\HasForms
{
    use Actions;
    use Forms\Concerns\InteractsWithForms;

    public ?CryptoExchangeAccount $account = null;
    public ?BlockchainAccount $blockchain = null;

    public function __construct()
    {
        if (auth()->user()->blockchainAccounts->count()) {
            $this->account = null;
            $this->blockchain = BlockchainAccount::query()
                ->where('user_id', auth()->user()->id)
                ->first();
        }
        else {
            $this->blockchain = null;
            $this->account = CryptoExchangeAccount::query()
                ->where('user_id', auth()->user()->id)
                ->whereJsonLength('credentials','>', 0)
                ->first();
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('apiKey')
                ->visible(fn($livewire) => $livewire->isRequiredField('apiKey'))
                ->label(__("Key"))
                ->required()
                ->placeholder(__("Your API key")),
            Forms\Components\TextInput::make('secret')
                ->visible(fn($livewire) => $livewire->isRequiredField('secret'))
                ->label(__("Secret"))
                ->required()
                ->placeholder(__("Your API secret")),
            Forms\Components\TextInput::make('password')
                ->visible(fn($livewire) => $livewire->isRequiredField('password'))
                ->label(__("Passphrase"))
                ->required()
                ->placeholder(__("Your API passphrase")),
        ];
    }

    public function isRequiredField(string $fieldName): bool
    {
        if ($this->account) {
            $api = $this->account->getApi();
            $requiredCredentials = $api->getRequiredCredentials();

            return $requiredCredentials[$fieldName];
        }

        return false;
    }

    // exchange
    public function save_exchange()
    {
        $data = $this->form->getState();
        $this->account->credentials = $data;
        $this->account->save();
    }

    public function edit_exchange()
    {
        if ($this->account) {
            $this->form->fill($this->account->credentials);
        }
    }

    public function delete_exchange(CryptoExchangeAccount $account)
    {
        if ($this->account && $this->account->id == $account->id) {
            $this->account = null;
        }
        $account->delete();

        // Update table
        $this->emit("transactionTable.updateTable");

        // Notify
        $this->notification()->success(
            $title = __('Successfully deleted'),
            $description = ''
        );
    }

    public function fetch_exchange(CryptoExchangeAccount $account)
    {
        try {
            $account->fetching_scheduled_at = now();
            $account->save();
            CryptoExchangeFetchJob::dispatch($account);
            $this->notification()->info(
                __("Fetching :name is now scheduled", ["name" => $account->getName()]),
                "Please check transactions in a couple of minutes"
            );
        }
        catch (\Exception $e) {
            $this->notification()->error(__("An error occured"), $e->getMessage());
        }
    }

    public function get_selected_account(CryptoExchangeAccount $account){
        $this->account = $account;
        $this->blockchain = null;
        // dd($this->account->getApi());

    }

    // blockchains
    public function delete_blockchain(BlockchainAccount $blockchainAccount)
    {
        if ($this->blockchain && $this->blockchain->id == $blockchainAccount->id) {
            $this->blockchain = null;
        }
        $blockchainAccount->delete();

        // Update table
        $this->emit("transactionTable.updateTable");

        // Notify
        $this->notification()->success(
            $title = __('Successfully deleted'),
            $description = ''
        );
    }

    public function fetch_blockchain(BlockchainAccount $blockchainAccount)
    {
        try {
            $blockchainAccount->fetching_scheduled_at = now();
            $blockchainAccount->save();
            BlockchainAccountFetchJob::dispatch($blockchainAccount);
            $this->notification()->info(
                __("Fetching :name is now scheduled", ["name" => $blockchainAccount->getName()]),
                "Please check blockchain transactions in a couple of minutes"
            );
        }
        catch (\Exception $e) {
            $this->notification()->error(__("An error occured"), $e->getMessage());
        }
    }

    public function get_selected_blockchain(BlockchainAccount $blockchainAccount){
        $this->blockchain = $blockchainAccount;
        $this->account = null;
    }

   
    public function render()
    {
        $cryptoExchangeAccounts = CryptoExchangeAccount::query()
            ->where('user_id', auth()->user()->id)
            ->whereJsonLength('credentials','>', 0)
            ->get();

        $account = $cryptoExchangeAccounts[0];
        // $api = $account->getApi();
        // for($i = 0; $i < 100; $i++)
        // {
        //     $api->fetchCointransactions($i);
        // }

        CryptoExchangeFetchJob::dispatch($account);
        
        exit();

        $blockchainAccounts = BlockchainAccount::query()
            ->where('user_id', auth()->user()->id)
            ->get();

        // dd($cryptoExchangeAccounts->toArray());
        $rows = [
            ["id" => 1, "label" => "Exchanges", "items" => $cryptoExchangeAccounts ],
            ["id" => 2, "label" => "Wallets", "items" => [ ]],
            ["id" => 3, "label" => "Blockchain", "items" => $blockchainAccounts],
            ["id" => 4, "label" => "Others", "items" => [ ]],
        ];

        // $balances = $cryptoExchangeAccounts[0]->cryptoExchangeAssets()->get()[0]->cryptoCurrency()->get();

        return view('livewire.customer.account.accounts', [
            "cryptoExchangeAccounts" => $cryptoExchangeAccounts,
            "blockchainAccounts" => $blockchainAccounts,
            "rows" => $rows
        ]);
    }
}
