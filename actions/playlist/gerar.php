<?php
require_once '../../config.php';

$qtdAgitada = intval($_POST['quantidadeAgitada']);
$qtdTransicao = intval($_POST['quantidadeTransicao']);
$qtdAdoracao = intval($_POST['quantidadeAdoracao']);

if ($qtdAgitada + $qtdAdoracao + $qtdTransicao === 0) {
	$_SESSION["aviso"] = "Você precisa escolher um tipo de musica pelo menos!";
	header("Location: index.php");
	exit();
}

$musica = new Musica($db);
$idMusicas = $musica->gerarPlaylist($qtdAgitada, $qtdTransicao, $qtdAdoracao);

$ids = implode(',', $idMusicas);

header('Location: /playlist.php?musicas=' . $ids);

$db->close();
