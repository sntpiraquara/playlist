<?php
require_once dirname(__FILE__, 3) . "/config.php";

$id = $_GET['musicaId'];

$musica = new Musica($db);
$musica->excluirMusica($id);

$db->close();

header('Location: /index.php');
