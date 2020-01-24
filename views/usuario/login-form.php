<div class="col-sm">
	<h2>Login</h2>
	
	<div class="aviso">
		<?php aviso();?>
	</div>

	<form action="actions/usuario/logar.php" method="POST">
		<div class="form-group">
			<label for="email">E-mail</label>
			<input id="email" class="form-control" required="required" type="email" name="email" placeholder="E-mail">
		</div>

		<div class="form-group"><label for="senha">Senha</label>
			<input id="senha" class="form-control" required="required" type="password" name="senha" placeholder="senha">
		</div>

		<button class="btn btn-lg btn-success" type="submit">
			Entrar <i data-feather="log-in"></i>
		</button>
	</form>

	<div class="mt-5">
		<a class="btn btn-danger" href="recuperar.php">Esqueceu sua senha?</a>
	<a class="btn btn-primary " href="cadastrar.php">Cadastrar-se</a>
	</div>
</div>
