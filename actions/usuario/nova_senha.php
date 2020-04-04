<?php

require_once "../../config.php";

$senha = addslashes($_POST['senha']);
$token = addslashes($_POST['token']);

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "UPDATE usuario SET senhaUsuario = '{$senha_hash}' WHERE token_email = '{$token}'";
$query = mysqli_query($db, $sql);

if (!$query) {
    $_SESSION['aviso'] = "Não Foi Possivel Recuperar a Senha.";
    header("location: /recuperar.php");
    exit($db->error);
} else {
    $_SESSION['aviso'] = "Senha Alterada Com Sucesso!";
    header("location: /login.php");
    exit();
}
$db->close();
