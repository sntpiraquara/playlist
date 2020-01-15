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

        $sql = "SELECT nomeArtista, nomeMusica, tipo FROM musicas WHERE id IN ($ids) ORDER BY tipo ASC";
        $rows = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($rows) <= 0) {
            return [];
        }

        while ($row = mysqli_fetch_assoc($rows)) {
            $musica = new Musica($this->db);
            $musica->nomeArtista = $row["nomeArtista"];
            $musica->nomeMusica = $row["nomeMusica"];
            $musica->tipo = $row["tipo"];

            array_push($musicas, $musica);
        }

        return $musicas;
    }
}
