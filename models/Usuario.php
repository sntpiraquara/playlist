<?php
class Usuario
{
    private $db;

    public $id;
    public $email;
    public $senha;
    public $token_email;
    public $nome;
    public $validado;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function cadastrar()
    {
        $sql = "INSERT INTO usuario (nomeUsuario, senhaUsuario, emailUsuario, token_email) VALUES ('$this->nome', '$this->senha', '$this->email', '$this->token_email')";

        if (!$this->db->query($sql)) {
            exit($this->db->error);
            return false;
        }
        return true;
    }

    public function existe($sql)
    {
        $query = $this->db->query($sql);

        if (!$query) {
            error_log($this->db->error . PHP_EOL);
            return false;
        }

        $encontrado = mysqli_num_rows($query);

        if ($encontrado > 0) {
            return true;
        }

        return false;
    }

    public function confirmarCadastro($token)
    {
        $sql = "SELECT * FROM usuario WHERE token_email = '$token';";
        $query = $this->db->query($sql);

        if (!$query) {
            return false;
            exit();
        }

        $usuario = mysqli_fetch_assoc($query);

        $sql = "UPDATE usuario SET validado = 1 WHERE id = {$usuario['id']};";
        $query = $this->db->query($sql);

        if (!$query) {
            return false;
            exit();
        }
        return true;
    }
}
