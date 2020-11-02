<?php

return [
    'appName'                   => env('APP_NAME', 'Laravel'),
    'appNameLong'               => 'BlueQuiver HR Management System',
    'appNameShort'              => 'BQHr',

    'baseUrl'                   => env('APP_BASE_URL'),
    'appUrl'                    => env('APP_URL'),

    'slogan'                    => 'The expert one-stop HR solutions toolbox',
    'meta_desc'                  => 'The expert one-stop HR solutions toolbox',

    'website'                   => 'https://' . env('APP_BASE_URL'),
    'email'                     => 'hello@' . env('APP_BASE_URL'),

    'year_start'                => 1900,

    'version'                   => '0.1.0beta',

    'max_education'             => 6,
    'max_experience'            => 4,
    'max_relative'              => 5,
    'max_emergency'             => 3,

    'userPhoto'                 => 'users/photo',
];
