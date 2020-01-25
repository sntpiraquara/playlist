<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function dd($data)
{
    echo '<pre>';
    foreach (func_get_args() as $var) {
        var_dump($var);
    }
    die();
}

function enviarEmail($from, $to, $subject, $body)
{
    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer;

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.mailgun.org'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'brad@sandbox176b7676cd5e4987a02c450043f9d035.mailgun.org'; // SMTP username
        $mail->Password = '5af6d467100e54c6009f4a67d85c5be7-9dfbeecd-3a7a4c37'; // SMTP password
        $mail->port = 465; // TCP port to connect to
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
        return false;
    }
}

function aviso()
{
    if (isset($_SESSION['aviso'])) {
        echo "<div class='alert alert-secondary' role='alert' alert-dismissible fade show><p>"
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
