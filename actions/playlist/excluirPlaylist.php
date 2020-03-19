<?php
require_once dirname(__FILE__, 3) . "/config.php";

$id = $_GET['id'];

$playlist = new Playlist($db);
$playlist->excluir_playlist($id);

$db->close();

header('Location: /views/playlist/listaPlaylist.php');
