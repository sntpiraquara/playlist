<?php
$title = 'playlist';

require_once 'header.php';

verificaUsuarioLogado();

?>
<body>
	<?php  include_once 'template/nav.php';?>

	<div class="container">
		<div class="row mt-2">
			<?php
			include_once 'indexCadastrar.php';
			include_once 'indexGerar.php';
			?>
		</div>

		<div class="row mt-4">
			<?php include_once 'tabelaMusicas.php'; ?>
		</div>

		<?php include_once 'footer.php';?>
	</div>
</body>