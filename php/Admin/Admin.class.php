<?php

/**
 * Admin
 */
class Admin
{

    
    /**
     * __construct
     *
     * @param  mixed $connection
     * @return void
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    
    /**
     * Register_saal
     *
     * @param  mixed $saalid
     * @param  mixed $sitze
     * @return void
     */
    public function Register_saal($saalid, $sitze)
    {
        $sql = "INSERT INTO saal1 (sitze, saal_id)VALUES ('$saalid','$sitze');";
        $result = $this->connection->query($sql);

        if (!$result) {
            echo mysqli_error($this->connection);
            die($this->connection->error);
        }
    }    
    /**
     * Register_film
     *
     * @param  mixed $filmid
     * @param  mixed $time
     * @return void
     */
    public function Register_film($filmid, $time)
    {
        $sql = "INSERT INTO film (name, zeit)VALUES ('$filmid','$time');";

        $result = $this->connection->query($sql);

        if (!$result) {
            echo mysqli_error($this->connection);
            die($this->connection->error);
        }
        header("Location: Admin.html");
    }
}
