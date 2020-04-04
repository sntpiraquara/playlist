<?php
$title = 'Restaurar Senha';
require_once '../../config.php';
include '../../views/template/header.php';
?>
<body>
	<div class="container">
		<div class="row mt-5">
			<h2>Restaure Sua Senha!</h2>
			<div class="col-sm-12 mt-5">
				<form method="POST" action="/nova_senha.php">
					<div class="form-group"><label for="senha">Digite Sua Nova Senha:</label>
						<input id="senha" class="form-control" required="required" type="password" name="senha" placeholder="Sua Nova Senha">
					</div>
					<button class="btn btn-lg btn-success" type="submit">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</body>
<?php include_once '../../views/template/footer.php';?>
