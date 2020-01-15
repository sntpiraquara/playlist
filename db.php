<?php
session_start();

include 'util.php';

require_once "Classes/Usuario.php";
require_once "Classes/Musica.php";
require_once "Classes/Playlist.php";

// conexão com o banco de dados
$db = mysqli_connect("localhost", "root", "5544", "playlist");

// verificando conexão com o banco de dados
if (!$db) {
    echo "não conectado ao mysql " . PHP_EOL;
    echo "debug do erro " . mysqli_connect_errno() . PHP_EOL;
    echo "debug do erro " . mysqli_connect_error() . PHP_EOL;
}
