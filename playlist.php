	<?php
$title = "playlist";

require_once 'header.php';

$ids = $_GET['musicas'];

$playlist = new Playlist($db);
$musicas = $playlist->getMusicas($ids);

$db->close();

if (count($musicas) <= 0) {
    $_SESSION['aviso'] = "Nenhuma playlist encontrada!";
    aviso();
    exit;
}
?>
	<body>
		<div class="container">
			<div class="row">
				<h1>Sua playlist!</h1>
				<table class="table table-striped table-bordered">
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
    echo "<a class='btn btn-primary' href='index.php'>voltar</a>";
}
include 'footer.php';
?>
			</div>
		</div>


