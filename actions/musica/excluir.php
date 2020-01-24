<?php
require_once '../../config.php';

$id = $_GET['musicaId'];

$musica = new Musica($db);
$musica->excluirMusica($id);

$db->close();

header('Location: /index.php');
