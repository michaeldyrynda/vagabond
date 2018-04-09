<?php

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'sqlite' => require __DIR__.'/sqlite.php',

        'mysql' => require __DIR__.'/mysql.php',

    ],

];
