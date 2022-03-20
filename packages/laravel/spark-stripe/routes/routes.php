<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Spark\Http\Controllers',
    'prefix' => 'spark'
], function () {
    // Stripe Webhook Controller...
    Route::post('webhook', 'WebhookController@handleWebhook');

    Route::group(['middleware' => config('spark.middleware', ['web', 'auth'])], function () {
        // Subscription...
        Route::post('/subscription', 'NewSubscriptionController');
        Route::put('/subscription', 'UpdateSubscriptionController');
        Route::put('/subscription/cancel', 'CancelSubscriptionController');
        Route::put('/subscription/resume', 'ResumeSubscriptionController');

        // Payment Method...
        Route::put('/subscription/payment-method', 'UpdatePaymentMethodController');

        // Billing Information...
        Route::put('/billing-information', 'UpdateBillingInformationController');

        // Receipt Emails...
        Route::put('/receipt-emails', 'UpdateReceiptEmailsController');

        // Apply a Coupon...
        Route::put('/coupon', 'ApplyCouponController');

        // Stripe Setup Intent Tokens...
        Route::get('/token', 'StripeTokenController');

        // Vat Rate Controller...
        Route::post('/tax-rate', 'TaxController');

        // Billing Information...
        Route::get('/{type}/{id}/receipts/{receiptId}/download', 'DownloadReceiptController')->name('receipts.download');
    });
});

Route::group([
    'middleware' => config('spark.middleware', ['web', 'auth']),
    'namespace' => 'Spark\Http\Controllers',
    'prefix' => config('spark.path'),
], function () {
    Route::get('/{type?}/{id?}', 'BillingPortalController')->name('spark.portal');
});
