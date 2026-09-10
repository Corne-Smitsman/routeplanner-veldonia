<?php

return [

    'admin' => [
        'name' => env('ADMIN_NAME', 'Corné Smitsman'),
        'email' => env('ADMIN_EMAIL', 'corne@innovaware.nl'),
        'password' => env('ADMIN_PASSWORD'),
    ],

    'min_transfer_minutes' => 5,

    'alternatives' => 2,

    'roles' => [
        'reiziger',
        'beheerder',
    ],

];
