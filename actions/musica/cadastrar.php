<?php
require_once dirname(__FILE__, 3) . "/config.php";

$artista = addslashes($_POST['artista']);
$nome = addslashes($_POST['nome']);
$tipo = addslashes($_POST['tipo']);

$musica = new Musica($db);
$musica->artista = $artista;
$musica->nome = $nome;
$musica->tipo = $tipo;
$musica->cadastrar();

header("Location: /index.php");

$db->close();
