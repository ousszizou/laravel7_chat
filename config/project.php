<?php

return [
    'seed' => [
        'test_name' => env('TEST_NAME', 'Test'),
        'test_email' => env('TEST_EMAIL', 'test@gmail.com'),
        'test_password' => env('TEST_PASSWORD', 'password'),
    ],
    'admin' => [
        'roles' => [
            'administrator' => 'administrator',
            'moderator' => 'moderator',
        ]
    ],
];
