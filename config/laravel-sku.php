<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SKU settings
    |--------------------------------------------------------------------------
    |
    | Set up your SKU
    |
    */
    'default' => [
        /*
         * SKU is based on a specific field of a model
         *
         */
        'source' => ['name', 'batch_no', 'expire_date'],

        /*
         * Destination model field name
         *
         */
        'field' => 'sku',

        /*
         * SKU separator
         *
         */
        'separator' => '-',

        /*
         * Shall SKUs be enforced to be unique
         *
         */
        'unique' => true,

        /*
         * Shall SKUs be generated on create
         *
         */
        'generate_on_create' => true,

        /*
         * Shall SKUs be re-generated on update
         *
         */
        'generate_on_update' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | SKU Generator
    |--------------------------------------------------------------------------
    |
    | Define your own generator if needed.
    | It must implement \BinaryCats\Sku\Contracts\SkuGenerator
    |
    */
    'generator' => \BinaryCats\Sku\Concerns\SkuGenerator::class,
];
