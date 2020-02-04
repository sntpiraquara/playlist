<?php
require_once '../../config.php';

$email = $_POST['email'];

$usuario = new Usuario($db);

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

    enviarEmail(
        "playlist@localhost.com",
        $usuario['emailUsuario'],
        "Recuperar Senha",
        "Sua senha é:" . $usuario['senhaUsuario']
    );
}

$_SESSION['aviso'] = "Sua senha foi recuperada. Verifique seu E-mail";
header("Location: /recuperar.php");
