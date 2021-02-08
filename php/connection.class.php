<?php


$connection = new mysqli('localhost', 'root', 'root', 'kino','3306');

if ($connection->connect_error) {
    die( "Failed to connect to MySQL: " . $connection->connect_error);
    
}
    else {
        echo "Connection successful";
    }