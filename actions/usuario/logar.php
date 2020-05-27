<?php
require_once "../../config.php";

$usuario = new Usuario($db);

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$sql = "SELECT senhaUsuario FROM usuario WHERE emailUsuario = '{$email}';";

$consult = mysqli_query($db, $sql);

$user = mysqli_fetch_assoc($consult);

$verify_paswd = password_verify($senha, $user['senhaUsuario']);

if ($verify_paswd) {
    $sql = "SELECT emailUsuario, senhaUsuario
	FROM   usuario
	WHERE  emailUsuario = '{$email}'
	AND    validado = true;";

    $existe = $usuario->existe($sql);
    if ($existe) {
        $_SESSION['validacao'] = true;
        header("Location: /index.php");
    }
} else {
    $_SESSION['aviso'] = 'Email e/ou senha incorretos ou não existem';
    header("Location: /login.php");
}

$db->close();
