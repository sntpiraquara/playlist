<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function enviarEmail($from, $to, $subject, $body)
{
    $mail = new PHPMailer(true);

    try {
        global $CONFIG;

        $mail = new PHPMailer;

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = $CONFIG['mailgun']['host']; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $CONFIG['mailgun']['user']; // SMTP username
        $mail->Password = $CONFIG['mailgun']['password']; // SMTP password
        $mail->port = $CONFIG['mailgun']['port']; // TCP port to connect to
        $mail->SMTPSecure = 'tls'; // Enable encryption, only 'tls' is accepted

        $mail->From = $from;
        $mail->FromName = 'Snt-playlist';
        $mail->addAddress($to); // Add a recipient

        $mail->WordWrap = 50; // Set word wrap to 50 characters

        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log($e);
        return false;
    }
}

function aviso()
{
    if (isset($_SESSION['aviso'])) {
        echo "<div class='alert alert-dark' role='alert' alert-dismissible fade show><p>"
            . $_SESSION['aviso'] .
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></p></div>";
    }
    unset($_SESSION['aviso']);
}

function enviarEmailValidacao($nome, $email, $token)
{
    enviarEmail(
        "playlist@localhost.com",
        $email,
        "Confirmacao Cadastro",
        "para confirmar o cadastro clique no link:<a href='http://playlist.test/confirmar-cadastro.php?token=" . $token . "'>clique aqui</a>"
    );
}

function verificaUsuarioLogado()
{
    if ($_SESSION['validacao'] == false) {
        header("location:login.php");
        exit;
    }
}
