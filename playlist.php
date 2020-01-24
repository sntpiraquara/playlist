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
						<?php require_once 'views/playlist/tabela-playlist.php'; ?>
					<?php endif; ?>

					<?php if (isset($_SESSION['validacao'])) : ?>
						<div class="mt-5">
							<a class='btn btn-primary' href='index.php'>Voltar</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php include 'views/template/footer.php'; ?>
	</body>
	<?php
	$db->close();
	?>

