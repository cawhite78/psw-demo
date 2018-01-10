<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'algolia' => [
        'app_id' => '951KFANIRT',
        'secret' => '348b13480226cc2a125ea5632d495196',
        'search' => '435d160a01400128fb8c43509bc6179e',
        'index' => 'psw_demo_products',
    ],
    'bing' => [
        'spell_check' =>  [
            'keys' => [
                'ca761199adbb428bb907e5dc233b5805',
                //'df7f87b53c74a9b864f0148e7b0cd6d',
            ],
            'host' =>'https://api.cognitive.microsoft.com',
            'path' => '/bing/v7.0/spellcheck?'
        ],
    ],
    'lps' => [
        'endpoint' =>'http://www.poolsupplyworld.com/api.cfm?productid=',
        'authkey' => 'I0LTLQSFVVWS7QE-corey',
        'product_ids' => [
            2170,
            2174,
            19306,
            103799,
            142608,
            2218,
            40568,
            27971,
            19650,
            193903,
            141438,
            270437,
            184070,
            926,
            88381,
            26457,
            194517,
            193392,
            57015,
            57014,
            98661,
            148541
        ]
    ]
];
