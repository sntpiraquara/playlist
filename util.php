<?php

require 'vendor/autoload.php';

use Mailgun\Mailgun;

/**
 * @param @var string $from
 * @param @var string $to
 * @param @var string $subject
 * @param @var string $body
 * @param @var string $html
 * @return bool
 */
function enviarEmail($from, $to, $subject, $body, $html)
{
    try {
        global $CONFIG;

        $domain = $CONFIG['mailgun']['domain'];
        $apiUrl = "https://api.mailgun.net/v3/$domain";
        $mgClient = Mailgun::create($CONFIG['mailgun']['key'], $apiUrl);
        $params = array(
            'from'    => $from,
            'cc'      => $to,
            'bcc'     => $to,
            'to'      => $to,
            'subject' => $subject,
            'text'    => $body,
            'html'    => $html,
        );

        # Make the call to the client.
        $mgClient->messages()->send($domain, $params);

        return true;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}

/**
 * @param null
 * @return string
 */
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

/**
 * @param @var string $email
 * @param @var integer $token
 * @return bool
 */
function enviarEmailValidacao($email, $token)
{
    enviarEmail(
        "playlist@localhost.com",
        $email,
        "Confirmacao Cadastro",
        "para confirmar o cadastro clique no link:",
        "<html><b>Para que possamos confirmar seu cadastro</b> <a href='" . $_SERVER['SERVER_NAME'] . "/confirmar-cadastro.php?token=" . $token . "'>clique aqui</a></html>"
    );
}
/**
 * @param null
 * @return string
 */
function verificaUsuarioLogado()
{
    if ($_SESSION['validacao'] == false) {
        header("location:login.php");
        exit;
    }
}
