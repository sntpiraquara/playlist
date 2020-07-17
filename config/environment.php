<?php

function getMysqlConfigFromEnv()
{
    $url = getenv("DATABASE_URL");
    $config = parse_url($url);
    $dbName = substr($config['path'], 1);

    return [
        'url'      => $url,
        'host'     => $config['host'],
        'port'     => $config['port'],
        'user'     => $config['user'],
        'password' => $config['pass'],
        'database' => $dbName,
    ];
}

return [
    'env'      => getenv("APP_ENV") ?: "dev",

    'mailgun'  => [
        'key'    => getenv("MAILGUN_API_KEY") ?: null,
        'domain' => getenv("MAILGUN_DOMAIN") ?: null,
    ],

    'database' => [
        'postgres' => getMysqlConfigFromEnv(),
    ],
];

