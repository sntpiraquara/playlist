<?php
require_once "../../config.php";

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$confirmarSenha = addslashes($_POST['confirmarSenha']);

if ($senha != $confirmarSenha) {
    $_SESSION['aviso'] = "As senhas não conferem!";
    exit(header("location: /cadastrar.php"));
}

$sql = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '{$email}';";

$usuario = new Usuario($db);
$emailExiste = $usuario->existe($sql);

if ($emailExiste) {
    $_SESSION['aviso'] = 'Esse endereço de E-mail já existe';
    exit(header("Location: /cadastrar.php"));
}

$token_email = rand(10000, 999999999999);

$usuario->nome = $nome;
$usuario->senhaRecuperar = $senha;
$usuario->senha = password_hash($senha, PASSWORD_DEFAULT);
$usuario->email = $email;
$usuario->token_email = $token_email;

enviarEmailValidacao($usuario->email, $usuario->token_email);

$usuario->cadastrar();

$_SESSION['aviso'] = "Cadastro Realizado! Verifique o link no seu email.";

header("Location: /login.php");

$db->close();
