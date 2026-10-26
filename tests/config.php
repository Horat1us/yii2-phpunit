<?php

return [
    'aliases' => [
        '@Horat1us/Yii/PHPUnit/Tests' => __DIR__,
    ],
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => getenv('DB_DSN') ?: 'sqlite::memory:',
            'username' => getenv('DB_USERNAME') ?: null,
            'password' => getenv('DB_PASSWORD') ?: null,
        ],
    ],
];
