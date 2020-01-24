<?php
$title = "cadastro de usuario";

require_once 'config.php';
require_once 'views/template/header.php';
?>
<body>
	<div class="container">
		<div class="row">
			<?php include_once 'views/usuario/cadastro-form.php' ?>
		</div>
	</div>
	
	<?php require_once 'views/template/footer.php';?>
</body>	
