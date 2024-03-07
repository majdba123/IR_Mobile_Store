<?php


return [

    /*

     * Path to the storage folder where your files will be stored

     */

    'exports' => [

        'path' => storage_path('exports'),

    ],


    /*

     * Path to the storage folder where your files will be imported from

     */

    'imports' => [

        'path' => storage_path('imports'),

    ],


    /*

     * The maximum number of rows that should be read at once from the file

     */

    'read_limit' => 1000,


    /*

     * The default timezone that should be used

     */

    'timezone' => 'UTC',


    /*

     * The default locale that should be used

     */

    'locale' => 'en',

];
