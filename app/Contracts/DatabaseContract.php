<?php

namespace App\Contracts;

interface DatabaseContract {
    public function __construct(string $url);
    public function query($sql);
    public function length($query);
    public function close();
}