<?php
class sitzplatz
{

    private $firstname;
    private $lastname;
    private $connection;

    public function __construct($firstname, $lastname, $saalid, $placeid, $filmid, $connection)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->idsaal = $saalid;
        $this->idplatz = $placeid;
        $this->film = $filmid;
        $this->connection = $connection;
    }

    public function Registeruser()
    {
        echo "started";
        $check = false;
        $this->check = $check;
        if ($this->firstname != "SELECT vorname FROM `user` WHERE (vorname) VALUE ('$this->firstname')" || $this->lastname != "SELECT nachname FROM `user` WHERE (nachname) VALUE ('$this->lastname')") {
            $this->check = true;
        }
        if ($this->check == true) {

            $sql = "INSERT INTO user (vorname, nachname)VALUES ('$this->firstname','$this->lastname');";

            echo "inserted";

            $result = $this->connection->query($sql);

            if (!$result) {
                echo mysqli_error($this->connection);
                die($this->connection->error);
            }
        }
    }
    public function Register_Place()
    {
        if ($this->check == true) {
            $userfs = "v, nachname) VALUES ('$this->firstname','$this->lastname');";
            $id = $this->connection->query($userfs);

            $filmfs = "SELECT id FROM `film` WHERE (name) VALUES ('$this->film');";
            $idf = $this->connection->query($filmfs);


            $sql = "INSERT INTO saal WHERE (platz_nummer,film_id_fs, saal_id) VALUES ('$this->idplatz',$idf,$id);";

            $result = $this->connection->query($sql);

            if (!$result) {
                echo mysqli_error($this->connection);
                die($this->connection->error);
            }
        }
    }

    public function visualise()
    {
    }
}
