<?php

return [
    'env'      => getenv("APP_ENV") ?: "dev",

    'mailgun'  => [
        'key'    => getenv("MAILGUN_API_KEY") ?: null,
        'domain' => getenv("MAILGUN_DOMAIN") ?: null,
    ],

    'database' => getenv("DATABASE_URL") ?: null
];
