<?php
session_start();

include 'util.php';

require_once "Classes/Usuario.php";
require_once "Classes/Musica.php";
require_once "Classes/Playlist.php";

// conexão com o banco de dados
$url = getenv("DATABASE_URL");

// Produção
if ($url) {
	$config = parse_url($url);
	$dbName = substr($config['path'], 1);

	$db = mysqli_connect($config['host'], $config['user'], $config['pass'], $dbName);
} else {
	$db = mysqli_connect("localhost", "root", "5544", "playlist");
}

// verificando conexão com o banco de dados
if (!$db) {
	error_log("não conectado ao mysql " . PHP_EOL);
	error_log(mysqli_connect_errno() . PHP_EOL . mysqli_connect_error() . PHP_EOL);
	exit("Falha na conexão com o banco de dados.");
}
