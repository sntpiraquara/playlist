<?php
include 'config.php';

$token = $_GET['token'];

$usuario = new Usuario($db);
$usuario->confirmarCadastro($token);

$_SESSION['aviso'] = "Email confirmado, faça login.";
header("Location: login.php");

$db->close();
