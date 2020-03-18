<?php
require_once 'config.php';
require_once 'views/template/header.php';

$ids = $_GET['musicas'];

$playlist = new Playlist($db);
$musicas = $playlist->getMusicas($ids);
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<?php if (count($musicas) <= 0): ?>
					<h2>Nenhuma playlist encontrada!</h2>
					<?php else: ?>
						<?php include 'views/playlist/tabela-playlist.php';?>
					<?php endif;?>
					<?php aviso();?>
					<?php if (isset($_SESSION['validacao'])): ?>
						<div class="mt-5">
							<a class='btn btn-primary' href='index.php'>Voltar</a>
							<div class="form-group">
								<form action="actions/playlist/salvar_playlist.php" method="post">
									<input type="hidden" name="id_musicas" value="<?php echo $ids; ?>">
									<input type="submit" class="btn btn-success" value="Salve essa playlist">
									<input required="required" type="text" class="form-control" name="nome_playlist" placeholder="Nome da playlist">
								</form>
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php
include 'views/template/footer.php';
$db->close();
?>
	</body>

