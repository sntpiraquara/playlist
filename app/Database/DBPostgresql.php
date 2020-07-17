<?php

namespace App\Database;

use App\Contracts\DatabaseContract;

class DBPostgresql implements DatabaseContract
{
    private $connection;

    public function __construct(string $url)
    {
        $this->connection = pg_connect($url);
    }

    public function query($sql)
    {
        return pg_query($this->connection, $sql);
    }

    public function length($query)
    {
        return pg_numrows($query);
    }

    public function close()
    {
        pg_close($this->connection);
    }
}
