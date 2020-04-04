<?php
$title = "Restaurar Senha";
require_once 'config.php';
require_once 'views/template/header.php';
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>Recuperação de Senha</h2>

				<div class="aviso">
					<?php aviso();?>
				</div>

				<form action="actions/usuario/restaurar_senha.php" method="POST">
					<div class="form-group">
						<label for="email">E-mail</label>
						<input id="email" class="form-control" required="required" type="email" name="email" placeholder="digite seu E-mail">
					</div>

					<button class="btn btn-lg btn-success" type="submit">Recuperar</button>
				</form>

				<div class="mt-5">
					<a class="btn btn-primary" href="login.php">Voltar</a></p>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once 'views/template/footer.php';?>
