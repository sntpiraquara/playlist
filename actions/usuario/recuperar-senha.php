<?php
require_once '../../config.php';

$email = $_POST['email'];

$sql = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '{$email}'";
$query = $db->query($sql);

if (!$query) {
    echo $db->error . PHP_EOL;
    exit;
}

$validacao = mysqli_num_rows($query);

if ($validacao > 0) {

    $sql = "SELECT senhaUsuario, emailUsuario, nomeUsuario FROM usuario WHERE emailUsuario = '{$email}';";

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
            "plylist@localhost.com",
            $usuario['emailUsuario'],
            "Recuperar Senha",
            "Sua senha é:" . $usuario['senhaUsuario']
        );

    }
    $_SESSION['aviso'] = "Sua senha foi recuperada. Verifique seu E-mail";
    header("Location: /recuperar.php");

} else {
    $_SESSION['aviso'] = "E-mail digitado incorretamente ou não existe!";
}

header("Location: /recuperar.php");

$db->close();
