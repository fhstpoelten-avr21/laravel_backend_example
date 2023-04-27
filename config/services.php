<?php

return [

    /*
    |--------------------------------------------------------------------------
    | APIs
    |--------------------------------------------------------------------------
    |
    | Urls and base settings for api requests
    |
    */
    'verify_host' => env('CURL_VERIFY_HOST', true),
    'curl_timeout' => env('CURL_CONNECT_TIMEOUT', 5.0),
    'airlines' => [
        'base_url' => env('AIRLINES_BASE_URL', 'https://api.instantwebtools.net/v1/airlines'),
    ],
    'passengers' => [
        'base_url' => env('PASSENGERS_BASE_URL', 'https://api.instantwebtools.net/v1/passenger'),
    ],

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

];
