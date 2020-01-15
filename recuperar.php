<?php
$title = "recuperar senha";

include 'header.php';

?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>recuperação de senha</h2>
				<form action="recuperarSenha.php" method="POST">
					<p><label for="email">E-mail</label><br>
						<input id="email" class="form-control" required="required" type="email" name="email" placeholder="digite seu E-mail"></p>
					<p><button class="btn btn-success" type="submit">recuperar</button>
				</form>
				<a class="btn btn-primary" href="login.php">voltar ao login</a></p>
			</div>
		</div>
	</div>
	<div>
		<?php aviso();?>
	</div>
	<?php include 'footer.php';?>