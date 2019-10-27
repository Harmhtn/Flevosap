<?php

declare(strict_types=1);


return [
    //credentials database
    'database' => [
        'server_name' => 'remotemysql.com',
        'username' => 'XVs21o9ta5',
        'password' => '2YX46tPycJ',
        'db_name' => 'XVs21o9ta5',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    //credentials mail
    'mailer' => [
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'encryption' => 'ssl',
        'username' => 'team3wind@gmail.com',
        'password' => 'team3c123!',
        'fromEmail' => 'test@example.com',
        'fromName' => 'Flevosap team',
    ]
];