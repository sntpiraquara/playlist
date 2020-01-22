<?php

global $CONFIG;

require_once "Classes/Usuario.php";
require_once "Classes/Musica.php";
require_once "Classes/Playlist.php";

$config = $CONFIG['database']['mysql'];

$db = new mysqli(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['database'],
    $config['port']
);

// verificando conexão com o banco de dados
if ($db->connect_error) {
    error_log('Connect Error (' . $db->connect_errno . ') '
        . $db->connect_error);
    exit("Falha na conexão com o banco de dados.");
}
