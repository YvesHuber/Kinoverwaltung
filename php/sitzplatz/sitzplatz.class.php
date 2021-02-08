<?php
class sitzplatz
{

    private $firstname;
    private $lastname;

    public function __construct($firstname, $lastname,$saalid,$placeid,$filmid)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->idsaal = $saalid;
        $this->idplatz = $placeid;
        $this->film = $filmid;
    }

    public function Registeruser($connection)
    {
        $sql = "INSERT INTO user (vorname, nachname)VALUES ('$this->firstname','$this->lastname');";

        echo "inserted";

        $result = $connection->query($sql);

        if (!$result) {
            echo mysqli_error($connection);
            die($connection->error);
        }
    }
    public function Register_Place($connection)
    {
        $userfs = "SELECT id FROM `user` WHERE (vorname, nachname) VALUES ('$this->firstname','$this->lastname');";
        $id = $connection->query($userfs);

        $filmfs = "SELECT id FROM `film` WHERE (name) VALUES ('$this->film');";
        $idf = $connection->query($filmfs);


        $sql = "INSERT INTO saal WHERE (platz_nummer,user_id_fs,film_id_fs, saal_id) VALUES ('$this->idplatz','$userfs',$idf,$id);";

        $result = $connection->query($sql);

        if (!$result) {
            echo mysqli_error($connection);
            die($connection->error);
        }
    }

    public function visualise()
    {
    }
}
