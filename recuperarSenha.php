<?php
include 'db.php';

// recebe o email do usuario
$email = $_POST['email'];

// faz uma busca pelo usuario no db pelo email do usuario
$sql = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '{$email}'";
$query = $db->query($sql);

// verifica se a query esta ok
if (!$query) {
    echo $db->error . PHP_EOL;
    exit;
}

// retornando o numero de linhas pra saber se o email existe
$validacao = mysqli_num_rows($query);

// validacao do usuario se ele existir
if ($validacao > 0) {

// buscamos o email, senha e nome do usuario
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
