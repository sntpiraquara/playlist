<?php
include '../../config.php';
include '../../views/template/header.php';

$playlists = new Playlist($db);
$playlists = $playlists->get_playlists();
$playlist_query = mysqli_query($db, "SELECT * FROM playlist");
?>
<body>
	<div class="col-xl-12 col-sm-12">
		<div class="container">
			<div class="row">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Playlists Salvas</th>
						</tr>
					</thead>
					<?php if (mysqli_num_rows($playlist_query) > 0): ?>
						<tbody>
							<?php foreach ($playlists as $playlist): ?>
								<tr>
									<td>
										<a href="/playlist.php?musicas=<?php echo $playlist['id_musicas']; ?>">Playlist: <?php echo $playlist['nome_playlist']; ?></a>
									</td>
								</tr>
							<?php endforeach;?>
						</tbody>
					<?php endif;?>
				</table>
				<a class="btn btn-primary" href="/index.php">Voltar</a>
			</div>
		</div>
	</div>
</body>
</html>