<?php

class Musica
{
    private $db;

    public $id;
    public $nome;
    public $artista;
    public $id_artista;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function cadastrar_musica()
    {
        $sql = "INSERT INTO musicas (nomeMusica, id_artista) VALUES ('$this->nome','$this->id_artista')";
        if (!$this->db->query($sql)) {
            echo $this->db->error . PHP_EOL;
            return false;
        }
        return true;
    }

    public function cadastrar_artista()
    {
        $sql = "INSERT INTO artistas (nome) VALUES ('$this->artista')";
        if (!$this->db->query($sql)) {
            echo $this->db->error . PHP_EOL;
            return false;
        }
        return true;
    }

    public function id_artista()
    {
        $ids = [];
        $sql_id = "SELECT * FROM artistas ORDER BY id";
        $query = $this->db->query($sql_id);
        if (!$query) {
            exit($this->db->error . PHP_EOL);
            return false;
        }
        while ($row = mysqli_fetch_assoc($query)) {
            $ids = $row['id'];
        }
        return $ids;
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
