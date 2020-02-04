<?php
$title = 'Login';
require_once 'config.php';
include 'views/template/header.php';?>
<body>
	<div class="container">
		<div class="row">
			<?php include_once 'views/usuario/login-form.php';?>
		</div>
	</div>

	<?php include_once 'views/template/footer.php';?>
</body>
