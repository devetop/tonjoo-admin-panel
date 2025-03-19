<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Environments that should versioning the assets
    |--------------------------------------------------------------------------
    */
   'environments' => ['production', 'local'],

   /*
    |--------------------------------------------------------------------------
    | Should this package add HTTP2 server push links
    |--------------------------------------------------------------------------
    */
   'http2-server-push' => true,

    /*
    |--------------------------------------------------------------------------
    | Assets types
    |--------------------------------------------------------------------------
    */
   'types' => [
        'css' => [
            [
                'origin_dir' => 'assets/css',
                'dist_dir'   => 'assets/dist/css',
            ],
            [
                'origin_dir' => 'assets/frontend/css',
                'dist_dir'   => 'assets/dist/css',
            ],
        ],

        'js' => [
            [
                'origin_dir' => 'assets/js',
                'dist_dir'   => 'assets/dist/js',
            ],
            [
                'origin_dir' => 'assets/frontend/js',
                'dist_dir'   => 'assets/dist/js',
            ],
        ],
    ],
];
