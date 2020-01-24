<div class="col-sm">
	<h2>Cadastro</h2>
	
	<div class="aviso">
		<?php aviso();?>
	</div>

	<form action="actions/usuario/cadastro.php" method="POST">
		<div class="form-group">
			<label for="email">E-mail</label>
			<input class="form-control" id="email" required="required" type="email" name="email" placeholder="digite seu E-mail">
		</div>

		<div class="form-group">
			<label for="nome">Nome</label>
			<input class="form-control" id="nome" required="required" type="text" name="nome" placeholder="digite seu nome completo">
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="senha">Senha</label>
					<input class="form-control" id="senha" required="required" type="password" name="senha" placeholder="digite sua senha">
				</div>
			</div>
			
			<div class="col">
				<div class="form-group">
					<label for="confirmarSenha">Confirme sua senha</label>
					<input class="form-control" id="confirmarSenha" required="required" type="password" name="confirmarSenha" placeholder="digite sua senha novamente">
				</div>
			</div>
		</div>

		<button class="btn btn-lg btn-success" type="submit">Cadastrar</button>
		<a class="btn btn-default" href="login.php">Voltar</a>
	</form>
</div>
