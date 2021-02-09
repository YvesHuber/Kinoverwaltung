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
        if ($this->firstname != "SELECT vorname FROM `user` WHERE (vorname) VALUE ('$this->firstname');" || $this->lastname != "SELECT nachname FROM `user` WHERE (nachname) VALUE ('$this->lastname');") {
            $this->check = true;
        }
        if ($this->check == true) {

            $sql = "INSERT INTO user (vorname, nachname)VALUES ('$this->firstname','$this->lastname');";


            $result = $this->connection->query($sql);

            if (!$result) {
                echo mysqli_error($this->connection);
                die($this->connection->error);
            }
        }
    }
    public function Register_Place()
    {
            $userfs = "SELECT id FROM `user` WHERE (vorname,nachname) VALUES ('$this->firstname','$this->lastname');";
            $id = $this->connection->query($userfs);

            $filmfs = "SELECT id FROM `film` WHERE (name) VALUES ('$this->film');";
            $idf = $this->connection->query($filmfs);

            $pfs = "SELECT platz_nummer FROM `saal` WHERE (platz_nummer) VALUES ('$this->idplatz');";
            $idp = $this->connection->query($pfs);

            $sfs = "SELECT saal_plätze_id_fs FROM `saal` WHERE (saal_plätze_id_fs ) VALUES ('$this->idsaal');";
            $ids = $this->connection->query($sfs);



            echo $id ;

            if ($this->film == $idf) {
                if ($this->idplatz == $idp) {
                    if ($this->idsaal == $ids) {
                        echo($userfs);
                        $sql = "UPDATE saal SET (user_id_fs=$id);";
                        $result = $this->connection->query($sql);

                        if (!$result) {
                            echo mysqli_error($this->connection);
                            die($this->connection->error);
                        }
                    }
                }
            /*
            $sql = "INSERT INTO saal (user_id_fs) VALUES ('$userfs') WHERE platz_nummer = '$this->idplatz', film_id_fs = $idf , saal_id = $id;";
            
            $result = $this->connection->query($sql);

            if (!$result) {
                echo mysqli_error($this->connection);
                die($this->connection->error);
            }
            */
        }
    }

    public function visualise()
    {
    }
}
