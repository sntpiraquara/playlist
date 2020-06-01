<?php
require "config.php";
// verificaUsuarioLogado();

error_reporting(E_ERROR | E_PARSE);

function htmlToDOMDocument($url)
{
    $html = file_get_contents($url);
    $doc = new DOMDocument();
    $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    return $doc;
}

function getListaArtistas()
{
    $urlArtistasMaisOuvidos = 'https://www.letras.mus.br/mais-acessadas/gospelreligioso/';

    $doc = htmlToDOMDocument($urlArtistasMaisOuvidos);

    $XPath = new DOMXPath($doc);
    $links = $XPath->query('//ol[contains(@class, "top-list_art")]/li/a');

    $artistas = [];

    foreach ($links as $link) {
        $artistas[] = [
            'nome' => trim($link->textContent),
            'url'  => $link->getAttribute('href'),
        ];
    }

    sort($artistas);

    return $artistas;
}

function getMusicasDoArtista($artista)
{
    $listaMusicasElemento = '.cnt-list--alp .cnt-list-row.-song a';

    $doc = htmlToDOMDocument('https://www.letras.mus.br' . $artista['url']);
    $XPath = new DOMXPath($doc);
    $links = $XPath->query('//a[contains(@class, "song-name")]');

    $musicas = [];

    foreach ($links as $link) {
        $musicas[] = [
            'titulo' => trim($link->textContent),
            'url'    => $link->getAttribute('href'),
        ];
    }

    return $musicas;
}

$artistas = getListaArtistas();

$model = new Musica($db);

foreach ($artistas as $artista) {
    $model->artista = $artista['nome'];
    $model->cadastrar_artista();
    $idArtista = $model->id_artista();

    $musicas = getMusicasDoArtista($artista);

    foreach ($musicas as $musica) {
        $model->nome = $musica['titulo'];
        $model->id_artista = $idArtista;
        $model->cadastrar_musica();
    }
}
