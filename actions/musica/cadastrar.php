<?php
require_once dirname(__FILE__, 3) . "/config.php";

$artista = addslashes($_POST['artista']);
$nome = addslashes($_POST['nome']);

$musica = new Musica($db);
$musica->artista = $artista;
$musica->nome = $nome;
$musica->cadastrar();

header("Location: /index.php");

$db->close();
