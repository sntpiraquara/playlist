<?php
require_once '../../config.php';

$usuario = new Usuario($db);

$email = addslashes($_POST['email']);

$sql = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '{$email}' AND validado = 1;";

if (!$usuario->existe($sql)) {
    $_SESSION['aviso'] = "E-mail não encontrado ou invalidado!";
    header("location: /recuperar.php");
    exit();
}

$query = $db->query($sql);

$validacao = mysqli_num_rows($query);

if ($validacao <= 0) {
    $_SESSION['aviso'] = "E-mail digitado incorretamente ou não existe!";
    header("Location: /recuperar.php");
    $db->close();
} else {
    $password = bin2hex(random_bytes(6));
    $passwd4restore = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE usuario SET senhaUsuario = '{$passwd4restore}' WHERE emailUsuario = '{$email}';";
    $query = mysqli_query($db, $sql);
    if (!$query) {
        $_SESSION['aviso'] = "Não Foi Possivel Recuperar Sua Senha";
        header("location: /recuperar.php");
        exit($db->error);
    }
    $sql = "SELECT * FROM usuario WHERE emailUsuario = '{$email}';";
    $query = $db->query($sql);

    if (!$query) {
        exit($db->error);
    }
    $usuario = [];

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $usuario = $row;
        }
        $passwdRestore = password_verify($password, $usuario['senhaUsuario']);
        if ($passwdRestore) {
            enviarEmail(
                "playlist@localhost.com",
                $usuario['emailUsuario'],
                "Recuperar Senha",
                "Sua senha é: ",
                "<html>Sua senha é: <b>" . $usuario['senhaUsuario'] . "</b></html>"
            );
            $_SESSION['aviso'] = "Sua senha foi recuperada. Verifique seu E-mail";
            header("Location: /recuperar.php");
            exit();
        }
    }
}
