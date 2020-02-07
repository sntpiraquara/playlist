<?php

require 'vendor/autoload.php';

use Mailgun\Mailgun;

function enviarEmail($from, $to, $subject, $body, $html)
{
    try {
        global $CONFIG;

        $domain = $CONFIG['mailgun']['domain'];
        $apiUrl = "https://api.mailgun.net/v3/$domain";
        $mgClient = Mailgun::create($CONFIG['mailgun']['key'], $apiUrl);
        $params = array(
            'from'       => $from,
            'cc'         => $to,
            'bcc'        => $to,
            'to'         => $to,
            'subject'    => $subject,
            'text'       => $body,
            'html'       => $html,
            'attachment' => array(
                array(
                    'filePath' => 'test.txt',
                    'filename' => 'test_file.txt',
                ),
            ),
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
        "playlist@localhost.com", // var @from

        $email, //var @to

        "Confirmacao Cadastro", //var @subject

        "para confirmar o cadastro clique no link:<a href='", //var @body

       "<html>" $_SERVER['SERVER_NAME'] . "/confirmar-cadastro.php?token=" . $token . "'>clique aqui</a></html>" //var @html
    );
}

function verificaUsuarioLogado()
{
    if ($_SESSION['validacao'] == false) {
        header("location:login.php");
        exit;
    }
}
