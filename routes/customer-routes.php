<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::middleware('customer-setup')->group(function(){
    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // TODO routes
    Route::view('account', 'pages.customer.account.index')->name('account');
    Route::view('portfolio', 'pages.customer.portfolio.portfolio')->name('portfolio');
    Route::view('taxes', 'pages.customer.taxes.taxes')->name('taxes');
    Route::view('advisor', 'pages.customer.advisor.advisor')->name('advisor');
    Route::view('services', 'pages.customer.service.service')->name('services');

    // Transactions
    Route::view('transactions', 'pages.customer.transactions.transactions')->name('transactions');

    // Specials]
    Route::view('account/new', 'pages.customer.account.new')->name('account.new');
    Route::view('taxes/tax-loss-harvesting', 'pages.customer.taxes.tax-loss-harvesting')->name('taxes.tax-loss-harvesting');
    Route::view('taxes/tax-saving-opportunities', 'pages.customer.taxes.tax-saving-opportunities')->name('taxes.tax-saving-opportunities');

    // Advisor
    Route::view('advisor/detail', 'pages.customer.advisor.advisor-detail')->name('advisor.detail');

    // Invite Friends
    Route::view('invite', 'pages.customer.invite.invite')->name('invite');

    // Test only
    Route::prefix("test")->as("test.")->group(function() {
        Route::get('transactions', [Controllers\Customer\TransactionController::class, 'index'])
            ->name('transactions');
    });

    // fetch exchange trades 
    Route::post('fetch-trades', [Controllers\Customer\TradeController::class, 'fatchCointrades']);
});

// Settings
Route::redirect('user-setting', 'user-setting/profile');
Route::get('user-setting/{category?}', function($category = "profile"){
    return view('pages.user-setting.index', [
        "category" => $category
    ]);
})->name('user-setting');

// Specials
Route::view('/todo', 'errors.todo')->name('todo');
