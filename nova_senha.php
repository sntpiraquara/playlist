<?php

require_once "config.php";

$senha = addslashes($_POST['senha']);
$token = addslashes($_POST['token']);

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "UPDATE usuario SET senhaUsuario = '{$senha_hash}' WHERE token_email = '{$token}'";
$query = mysqli_query($db, $sql);

if (!$query || empty($token)) {
    $_SESSION['aviso'] = "Não foi possivel recuperar a senha.";
    header("location: /restaurar_senha.php");
    exit($db->error);
} else {
    $_SESSION['aviso'] = "Senha Alterada Com Sucesso!";
    header("loaction:/login.php");
    exit();
}
$db->close();
