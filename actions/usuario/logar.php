<?php
require_once "../../config.php";

$usuario = new Usuario($db);

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT emailUsuario, senhaUsuario
FROM usuario
WHERE emailUsuario = '{$email}'
AND senhaUsuario = '{$senha}'
AND validado = true;";

$existe = $usuario->existe($sql);

if ($existe) {
	$_SESSION['validacao'] = true;
	header("Location: /index.php");
} else {
	$_SESSION['aviso'] = 'Email e/ou senha incorretos ou não existem';
	header("Location: /login.php");
}

$db->close();
