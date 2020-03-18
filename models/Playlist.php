<?php

class Playlist
{

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getMusicas($ids)
    {
        $musicas = [];

        if (strlen($ids) === 0) {
            return [];
        }

        $sql = "SELECT nomeArtista, nomeMusica, tipo FROM musicas WHERE id IN ($ids) ORDER BY tipo ASC";
        $query = mysqli_query($this->db, $sql);

        if (!$query) {
            error_log(__FILE__ . ':' . __LINE__ . ' - ' . $this->db->error);
            return [];
        }

        if (mysqli_num_rows($query) === 0) {
            return [];
        }

        while ($row = mysqli_fetch_assoc($query)) {
            $musica = new Musica($this->db);
            $musica->nomeArtista = $row["nomeArtista"];
            $musica->nomeMusica = $row["nomeMusica"];
            $musica->tipo = $row["tipo"];

            array_push($musicas, $musica);
        }

        return $musicas;
    }

    public function salvar_playlist($nome, $id_musicas)
    {
        $nomePlaylist = addslashes($nome);

        $sql = "SELECT id_musica FROM playlist WHERE id_musicas = '{$id_musicas}';";
        $query = $this->db->query($sql);

        if (!$query || $query > 0) {
            error_log($this->db->error . PHP_EOL);
            $_SESSION['aviso'] = "playlist já existente!";
            return false;
        }

        $sql = "INSERT INTO playlist (nome_playlist, id_musicas) VALUES ('$nomePlaylist', '$id_musicas');";
        if (!$this->db->query($sql)) {
            exit($this->db->error);
            return false;
        }
        $_SESSION['aviso'] = "Playlist salva com sucesso!";
        return true;
    }

    public function existe($nome)
    {
        $sql = "SELECT nome_playlist FROM playlist WHERE nome_playlist = '{$nome}';";
        $query = $this->db->query($sql);

        if (!$query) {
            error_log($this->db->error . PHP_EOL);
            return false;
        }

        $encontrado = mysqli_num_rows($query);

        if ($encontrado > 0) {
            $_SESSION['aviso'] = "Essa playlist já existe, vamos lá, crie outro nome!";
            return true;
        }

        return false;
    }

    public function get_playlists()
    {
        $sql = "SELECT * FROM playlist;";
        $query = $this->db->query($sql);
        if (!$query) {
            error_log($this->db->error . PHP_EOL);
            return false;
        }
        $playlist = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($playlist) > 0) {
            while ($row = mysqli_fetch_assoc($playlist)) {
                $idMusicas[] = $row;
            }
            return $idMusicas;
        }
    }
}
