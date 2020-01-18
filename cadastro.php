<?php

include "config.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];

if ($senha != $confirmarSenha) {
	$_SESSION['aviso'] = "as senhas não conferem!";
	exit(header("location:cadastrar.php"));
}

$sql = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '{$email}';";

$usuario = new Usuario($db);
$emailExiste = $usuario->existe($sql);

if ($emailExiste) {
	$_SESSION['aviso'] = 'esse endereço de E-mail já existe';
	exit(header("location:cadastrar.php"));
}

$token_email = rand(10000, 999999999999);

$usuario->nome = $nome;
$usuario->senha = $senha;
$usuario->email = $email;
$usuario->token_email = $token_email;

enviarEmailValidacao($usuario->nome, $usuario->email, $usuario->token_email);

$usuario->cadastrar();

$_SESSION['aviso'] = "Cadastro Realizado! Verifique o link no seu email.";

header("location:login.php");

$db->close();
