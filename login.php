<?php
$title = 'login';
include 'header.php';
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>login!</h2>
				<div>
					<?php aviso();?>
				</div>
				<form action="logar.php" method="POST">
					<p><label for="email">E-mail</label>
						<input id="email" class="form-control" required="required" type="email" name="email" placeholder="E-mail"></p>
					<p><label for="senha">Senha</label>
						<input id="senha" class="form-control" required="required" type="password" name="senha" placeholder="senha"></p>
					<button class="btn btn-success" type="submit">entrar</button>
				</form>
				<br>
				<p><a class="btn btn-danger" href="recuperar.php">esqueci minha senha</a>
					<a class="btn btn-primary " href="cadastrar.php">cadastre-se</a></p>
				</div>
			</div>
			<?php include 'footer.php';?>