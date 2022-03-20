<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\CryptoExchangeFetchJob;
use App\Models\CryptoExchange;
use App\Models\CryptoExchangeAccount;
use App\Jobs\BlockchainAccountFetchJob;
use App\Models\BlockchainAccount;

class TradeController extends Controller
{
    public function fatchCointrades(Request $request)
    {
        $exchage_id = $request->exchange_id;
        $symbol_index = $request->data_index;
        $account = CryptoExchangeAccount::findOrFail($exchage_id);
        $api = $account->getApi();
        $fetch_result = $api->fetchCointransactions($symbol_index);
        if($fetch_result == 'finish')
        {
            $account->fetching_scheduled_at = null;
            $account->save();
        }
        return response()->json(['result'=>$fetch_result]);
    }
}
