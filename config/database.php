<?php

return [

    'connections' => [

        /**
         * Unlike a standard Laravel application, Nomad only requires a single
         * database connection, which it uses to manage your app migrations. 
         * Nomad uses the same database configuration as any Laravel app.
         */
        'default' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

    ],

];
