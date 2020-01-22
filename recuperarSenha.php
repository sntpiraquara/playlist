<?php
include 'db.php';

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
            "Sua nova senha:" . $usuario['senhaUsuario']
        );

    }
    $_SESSION['aviso'] = "sua senha foi recuperada, vá até o seu E-mail";
    header("location:recuperar.php");

} else {
    $_SESSION['aviso'] = "E-mail digitado incorretamente ou não existe!";
}
header("location:recuperar.php");
$db->close();
