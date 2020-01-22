<?php
$title = "cadastro de usuario";
include 'header.php';
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>cadastro de usuario</h2>
				<?php aviso();?>
				<form action="cadastro.php" method="POST">
					<p><label for="email">E-mail</label><br>
					<input class="form-control" id="email" required="required" type="email" name="email" placeholder="digite seu E-mail"></p>

					<p><label for="nome">Nome</label><br>
						<input class="form-control" id="nome" required="required" type="text" name="nome" placeholder="digite seu nome completo"></p>

					<p><label for="senha">Senha</label><br>
						<input class="form-control" id="senha" required="required" type="password" name="senha" placeholder="digite sua senha"></p>

					<p><label for="confirmarSenha">Confirme sua senha</label><br>
						<input class="form-control" id="confirmarSenha" required="required" type="password" name="confirmarSenha" placeholder="digite sua senha novamente"></p>

					<p><button class="btn btn-success" type="submit">cadastrar</button></p>
				</form>
				<a class="btn btn-danger" href="login.php">voltar</a>
			</div>
		</div>
	</div>
	<div>
		<?php include 'footer.php';?>
	</div>
