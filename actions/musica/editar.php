<?php
require_once '../../config.php';

$idMusica = $_POST['id'];
$nomeArtista = $_POST['artista'];
$nomeMusica = $_POST['nome'];
$tipo = $_POST['tipo'];

$sql = "UPDATE musicas
	SET nomeArtista = '$nomeArtista',
	nomeMusica = '$nomeMusica',
	tipo = '$tipo'
	WHERE id = $idMusica;";

if (!$db->query($sql)) {
    error_log(__FILE__ . ':' . __LINE__ . ' - ' . $db->error);
    $_SESSION['aviso'] = 'Ocorreu um erro!';
}

header('Location: /index.php');

$db->close();
