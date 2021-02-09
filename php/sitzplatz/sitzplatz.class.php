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
        if ($this->firstname != "SELECT vorname FROM 'user' WHERE (vorname) VALUE ('$this->firstname');" || $this->lastname != "SELECT nachname FROM 'user' WHERE (nachname) VALUE ('$this->lastname');") {
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
        $userfs = "SELECT id FROM user WHERE vorname = '$this->firstname'AND nachname = '$this->lastname';";
        $query = mysqli_query($this->connection, $userfs);
        $row = mysqli_fetch_assoc($query);
        $id = $row['id'];
        echo mysqli_errno($query);

        $bool = "SELECT besetzt FROM saal WHERE saal_plätze_id_fs='$this->idsaal'AND platz_nummer='$this->idplatz'AND film_id_fs='$this->film';";
        $query_bool = mysqli_query($this->connection, $bool);
        $row_bool =  mysqli_fetch_assoc($query_bool);
        $bool_resut = $row_bool['besetzt'];

        if($bool_resut == 'f'){
            $sql = "UPDATE saal SET user_id_fs = $id, besetzt = 't' WHERE saal_plätze_id_fs='$this->idsaal'AND platz_nummer='$this->idplatz'AND film_id_fs='$this->film';";
            $result = $this->connection->query($sql);
            echo mysqli_errno($this->connection);
        }else{
            echo "dieser Stuhl ist bereits besetzt, wählen sie ein anderes";
        }

        if (!$result) {
            echo mysqli_error($this->connection);
            die($this->connection->error);
        }
        header("Location: sitzplatz.html");
    }
    public function visualise()
    {

    }

    public function saalgenerate()
    {
        $count = 0;
        $idsaal = 3;
        for ($i = 0; $i <= $idsaal;) {
            while ($count < $idsaal) {

                $userfs = "SELECT sitze FROM saal_plätze WHERE id =$i; ";
                $querys = mysqli_query($this->connection, $userfs);
                $rows = mysqli_fetch_assoc($querys);
                $id = $rows['sitze'];
                $count++;
                $i++;
                echo $id;
                /*for ($p = 0; $p < $id; $p++)
                {
                    echo $p;

                    echo $i;
                    /*
                    $sql = "INSERT INTO ";

                    $result = $this->connection->query($sql);

                    if (!$result) {
                        echo mysqli_error($this->connection);
                        die($this->connection->error);
                    }
                    
                }
                */
                
            }
        }
    }
}
