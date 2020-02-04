<?php

require 'vendor/autoload.php';

use Mailgun\Mailgun;

function enviarEmail($from, $to, $subject, $body)
{
    try {
        global $CONFIG;

        $domain = $CONFIG['mailgun']['domain'];
        $apiUrl = "https://api.mailgun.net/v3/$domain";
        $mgClient = Mailgun::create($CONFIG['mailgun']['key'], $apiUrl);
        $params = array(
            'from'    => $from,
            'to'      => $to,
            'subject' => $subject,
            'text'    => $body,
        );

        # Make the call to the client.
        $mgClient->messages()->send($domain, $params);

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
        "para confirmar o cadastro clique no link:<a href='http://snt-playlist.herokuapp.com/confirmar-cadastro.php?token=" . $token . "'>clique aqui</a>"
    );
}

function verificaUsuarioLogado()
{
    if ($_SESSION['validacao'] == false) {
        header("location:login.php");
        exit;
    }
}
