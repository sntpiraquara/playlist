<?php

global $CONFIG;

$config = $CONFIG['database']['postgres'];

$db = pg_connect(
    $config['url']
) or die("falha na conexão!");

