	<?php
$title = "playlist";

require_once 'header.php';

$ids = $_GET['musicas'];

$playlist = new Playlist($db);
$musicas = $playlist->getMusicas($ids);

$db->close();

if (count($musicas) <= 0) {
    echo "<marquee><h1>nenhuma playlist encontrada!!!!!!</h1></marquee>";
    exit;
}
?>
	<body>
		<h1>Sua playlist</h1>
		<table class="tabela">
			<thead>
				<tr>
					<th>musica</th>
					<th>artista</th>
					<th>tipo</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($musicas as $musica): ?>
					<tr>
						<td><?php echo $musica->nomeMusica; ?></td>
						<td><?php echo $musica->nomeArtista; ?></td>
						<td><?php echo $musica->tipo; ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php

if (isset($_SESSION['validacao'])) {
    echo "<a class='btn btn-primary' href='index.php'><button>voltar</button></a>";
}
include 'footer.php';
?>

