<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function dd($data)
{
    exit(var_dump(func_get_args()));
}

function enviarEmail($from, $to, $subject, $body)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = "127.0.0.1"; // Set the SMTP server to send through
        $mail->Port = 1025; // TCP port to connect to

        //Recipients
        $mail->setFrom($from);
        $mail->addAddress($to); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function aviso()
{
    if (isset($_SESSION['aviso'])) {
        echo '<p>' . $_SESSION['aviso'] . '</p>';
    }
    unset($_SESSION['aviso']);
}

function enviarEmailValidacao($nome, $email, $token)
{
    enviarEmail(
        "playlist@localhost.com",
        $email,
        "Confirmacao Cadastro",
        "para confirmar o cadastro clique no link: <a href='http://playlist.test/confirmar-cadastro.php?token=" . $token . "'>clique aqui</a>"
    );
}

function verificaUsuarioLogado()
{
    if ($_SESSION['validacao'] == false) {
        header("location:login.php");
        exit;
    }
}
