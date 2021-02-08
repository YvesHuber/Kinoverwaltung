<?php

require_once('../connection.class.php');

class Saal{
    private $saal;
    private $film;
    private $zeit;
    private $connection;

    public function cunstruct($connection){
        $this->connection = $connection;
    }
    public function change(){
        
    }
    public function show(){
        $this->film = "SELECT name FROM Film";
        $this->connection->query($this->film);
        $this->connection->insert_id;
    }
}