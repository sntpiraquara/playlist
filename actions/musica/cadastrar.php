<?php
require_once '../../config.php';

$artista = $_POST['artista'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];

$musica = new Musica($db);
$musica->artista = $artista;
$musica->nome = $nome;
$musica->tipo = $tipo;
$musica->cadastrar();

header("Location: /index.php");

$db->close();
