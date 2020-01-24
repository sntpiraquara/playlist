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
}
