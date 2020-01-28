<?php

function getMysqlConfigFromEnv()
{
    $url = getenv("DATABASE_URL");

    // Produção
    if ($url) {
        $config = parse_url($url);
        $dbName = substr($config['path'], 1);

        return [
            'host' => $config['host'],
            'port' => $config['port'],
            'user' => $config['user'],
            'password' => $config['pass'],
            'database' => $dbName,
        ];
    } else {
        return [
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '5544',
            'port' => '3306',
            'database' => 'playlist',
        ];
    }
}

return [
    'env' => getenv("APP_ENV") ?: "dev",
    'mailgun' => [
        'host' => getenv("MAILGUN_SMTP_SERVER") ?: null,
        'port' => getenv("MAILGUN_SMTP_PORT") ?: null,
        'user' => getenv("MAILGUN_SMTP_LOGIN") ?: null,
        'password' => getenv("MAILGUN_SMTP_PASSWORD") ?: null,
        'domain' => getenv("MAILGUN_DOMAIN") ?: null,
    ],
    'database' => [
        'mysql' => getMysqlConfigFromEnv(),
    ],
];
