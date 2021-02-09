<?php

require_once('../connection.class.php');

class Saal{
    private $saal;
    private $film;
    private $zeit;
    private $connection;

    public function __cunstruct($connection){
        $this->connection = $connection;
    }
    public function change(){
        $new_film = "INSERT VALUES $this->film INTO name";
        $this->connection->query($new_film);
        echo "New Film registerd";
    }
    public function show(){
        $this->film = "SELECT name FROM Film";
        $this->connection->query($this->film);
    }
}