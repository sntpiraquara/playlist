<?php

namespace App\Database;

use App\Database\DBMysql;
use App\Database\DBPostgresql;
use App\Contracts\DatabaseContract;
use Exception;

class DB
{
    private DatabaseContract $connection;

    public function __construct($url)
    {
        $config = parse_url($url);
        $scheme = $config['scheme'];

        switch($scheme){
            case 'mysql':
                $this->connection = new DBMysql($url);
            break;
            case 'postgresql':
                $this->connection = new DBPostgresql($url);
            break;
            default:
             throw new Exception('Nao conheco esse DB Scheme');
        }
    }

    public function close()
    {
        $this->connection->close();
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function length($query)
    {
        return $this->connection->length($query);
    }
}
