<?php
require_once '../../config.php';

$usuario = new Usuario($db);

$email = addslashes($_POST['email']);

$sql = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '{$email}' AND validado = 1;";

if (!$usuario->existe($sql)) {
    $_SESSION['aviso'] = "E-mail não encontrado ou invalidado!";
    header("location: /recuperar.php");
    exit();
} else {
    $sql = "SELECT * FROM usuario WHERE emailUsuario = '{$email}';";
    $query = $db->query($sql);

    if (!$query) {
        exit($db->error);
    }
    $usuario = [];
    enviarEmail(
        "playlist@localhost.com",
        $usuario['emailUsuario'],
        "Recuperar Senha",
        "Restaurar Senha!",
        "<html>Clique para <a href='" . $_SERVER['SERVER_NAME'] . "/views/usuario/restaurar_senha_form.php?token=" . $usuario['token_email'] . "'>Restaurar Sua Senha!</html>"
    );
    $_SESSION['aviso'] = "Enviamos um link para o seu e-mail para recuperar sua senha!";
    header("Location: /recuperar.php");
    exit();
}
