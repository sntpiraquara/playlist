<?php
include dirname(__FILE__, 3) . "/config.php";

$idMusica = addslashes($_POST['id']);
$nomeArtista = addslashes($_POST['artista']);
$nomeMusica = addslashes($_POST['nome']);
$tipo = addslashes($_POST['tipo']);

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
