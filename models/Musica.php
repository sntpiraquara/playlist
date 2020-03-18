<?php

class Musica
{
    private $db;

    public $id;
    public $nome;
    public $artista;
    public $tipo;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function cadastrar()
    {
        $sql = "INSERT INTO musicas (nomeArtista, nomeMusica, tipo) VALUES ('$this->artista', '$this->nome', '$this->tipo')";
        if (!$this->db->query($sql)) {
            echo $this->db->error . PHP_EOL;
            return false;
        }
        return true;
    }

    public function gerarPlaylist($qtdAgitada, $qtdTransicao, $qtdAdoracao)
    {
        // array de id
        $idMusicas = [];

        $sql = "SELECT id FROM musicas WHERE tipo ='agitada' ORDER BY RAND() LIMIT $qtdAgitada";
        $musicas = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($musicas) > 0) {
            while ($row = mysqli_fetch_assoc($musicas)) {
                $idMusicas[] = $row['id'];
            }
        }

        $sql = "SELECT id FROM musicas WHERE tipo ='transicao' ORDER BY RAND() LIMIT $qtdTransicao";

        $musicas = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($musicas) > 0) {
            while ($row = mysqli_fetch_assoc($musicas)) {
                $idMusicas[] = $row['id'];
            }
        }

        $sql = "SELECT id FROM musicas WHERE tipo ='adoracao' ORDER BY RAND() LIMIT $qtdAdoracao";
        $musicas = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($musicas) > 0) {
            while ($row = mysqli_fetch_assoc($musicas)) {
                $idMusicas[] = $row['id'];
            }
        }
        return $idMusicas;
    }

    public function excluirMusica($id)
    {
        $sql = "DELETE FROM musicas WHERE id = $id";
        if (!$this->db->query($sql)) {
            error_log($this->db->error);
            return false;
        }
        return true;
    }
}
