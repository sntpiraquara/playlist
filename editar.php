<?php
include 'config.php';

$idMusica = $_POST['id'];
$nomeArtista = $_POST['artista'];
$nomeMusica = $_POST['nome'];
$tipo = $_POST['tipo'];

$sql = "UPDATE musicas SET nomeArtista = '$nomeArtista', nomeMusica = '$nomeMusica', tipo = '$tipo' WHERE id = $idMusica;";

if (!$db->query($sql)) {
    echo $db->error;
    exit();
}
header('location:index.php');

$db->close();
