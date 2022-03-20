<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => env('SOCIALLOGIN_FACEBOOK_CLIENT_ID', '1817560145299721'),
        'client_secret' => env('SOCIALLOGIN_FACEBOOK_CLIENT_SECRET', 'd0dd24f2fc641898e83e7677d59d9a61'),
        'redirect' => '/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => env('SOCIALLOGIN_GOOGLE_CLIENT_ID', '400308307893-nsvu5h5cgu90i7ve4qiuqs1bjdcteqj9.apps.googleusercontent.com'),
        'client_secret' => env('SOCIALLOGIN_GOOGLE_CLIENT_SECRET', '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'),
        'redirect' => '/auth/google/callback',
    ],
];
