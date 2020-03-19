<?php
require_once dirname(__FILE__, 3) . "/config.php";

$nome_playlist = strip_tags($_POST['nome_playlist']);
$id_musicas = strip_tags($_POST['id_musicas']);

$playlist = new Playlist($db);
if (empty($nome_playlist)) {
    $_SESSION['aviso'] = "não foi possivel salvar playlist, é necessario um nome!";
    header("location:/playlist.php?musicas=" . $id_musicas);
    exit;
} elseif ($playlist->existe($nome_playlist, $id_musicas)) {
    header("location:/playlist.php?musicas=" . $id_musicas);
    exit;
} else {
    $playlist->salvar_playlist($nome_playlist, $id_musicas);
    header("location:/playlist.php?musicas=" . $id_musicas);
    exit;
}
$db->close();
