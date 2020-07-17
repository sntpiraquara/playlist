<?php

namespace App\Database;

use App\Contracts\DatabaseContract;

class DBMysql implements DatabaseContract
{
    private $connection;

    public function __construct(string $url)
    {
        $config = parse_url($url);
        $dbName = substr($config['path'], 1);

        $this->connection = mysqli_connect(
            $config['host'],
            $config['user'],
            $config['pass'],
            $dbName,
            $config['port']
        );

        if (!$this->connection) {
            die(mysqli_connect_error());
        }
    }

    public function query($sql)
    {
        return mysqli_query($this->connection, $sql);
    }

    public function length($query)
    {
        return mysqli_num_rows($query);
    }

    public function close()
    {
        $this->connection->close();
    }
}
