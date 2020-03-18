<h1>Sua playlist!</h1>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Música</th>
			<th>Artista</th>
			<th>Tipo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($musicas as $musica): ?>
			<tr>
				<td><?= $musica->nomeMusica; ?></td>
				<td><?= $musica->nomeArtista; ?></td>
				<td><?= $musica->tipo; ?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>