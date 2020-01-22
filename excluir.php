<?php
include 'config.php';

$id = $_GET['musicaId'];

$musica = new Musica($db);
$musica->excluirMusica($id);

$db->close();

header('location:index.php');
