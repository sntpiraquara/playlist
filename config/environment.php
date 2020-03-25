<?php

function getMysqlConfigFromEnv()
{
    $url = getenv("JAWSDB_URL");

    $config = parse_url($url);

    $dbName = substr($config['path'], 1);

    return [
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
        'mysql' => getMysqlConfigFromEnv(),
    ],
];
