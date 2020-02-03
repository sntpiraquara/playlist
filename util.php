<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

function enviarEmail($from, $to, $subject, $body)
{
    $mail = new PHPMailer(true);

    try {
        global $CONFIG;

        $mail = new PHPMailer;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = $CONFIG['mailgun']['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $CONFIG['mailgun']['user'];
        $mail->Password = $CONFIG['mailgun']['password'];
        $mail->port = $CONFIG['mailgun']['port'];
        $mail->SMTPSecure = 'tls';

        $mail->From = 'playlist@' . $CONFIG['mailgun']['domain'];
        $mail->FromName = 'SNT Playlist';
        $mail->addAddress($to);

        $mail->WordWrap = 50;

        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage());
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
