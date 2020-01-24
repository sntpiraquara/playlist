<?php
require_once 'config.php';
require_once 'views/template/header.php';

verificaUsuarioLogado();
?>
<body>
	<?php include_once 'views/template/nav.php';?>

	<div class="container">
		<div class="row mt-2">
			<?php include_once 'views/musica/cadastrar-musica-form.php'; ?>
			<?php include_once 'views/playlist/gerar-playlist-form.php'; ?>
		</div>

		<div class="row mt-4">
			<?php include_once 'views/musica/tabela-musicas.php'; ?>
		</div>

	</div>

	<?php include_once 'views/template/footer.php';?>
</body>
