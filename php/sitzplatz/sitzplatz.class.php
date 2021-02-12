<?php

/**
 * sitzplatz
 */
class sitzplatz
{

    private $firstname;
    private $lastname;
    private $connection;

    /**
     * __construct
     *
     * @param  mixed $firstname
     * @param  mixed $lastname
     * @param  mixed $saalid
     * @param  mixed $placeid
     * @param  mixed $filmid
     * @param  mixed $connection
     * @return void
     */
    public function __construct($firstname, $lastname, $saalid, $placeid, $filmid, $connection)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->idsaal = $saalid;
        $this->idplatz = $placeid;
        $this->film = $filmid;
        $this->connection = $connection;
    }
    /**
     * Registeruser
     *
     * @return void
     */
    public function Registeruser()
    {
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
    /**
     * Register_Place
     *
     * @return void
     */
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

        if ($bool_resut == 'f') {
            $sql = "UPDATE saal SET user_id_fs = $id, besetzt = 't' WHERE saal_plätze_id_fs='$this->idsaal'AND platz_nummer='$this->idplatz'AND film_id_fs='$this->film';";
            $result = $this->connection->query($sql);
            echo mysqli_errno($this->connection);
        } else {
            echo "dieser Stuhl ist bereits besetzt, wählen sie ein anderes";
        }

        if (!$result) {
            echo mysqli_error($this->connection);
            die($this->connection->error);
        }
        header("Location: http://localhost/index.php");
    }

    /**
     * saalgenerate
     *
     * @return void
     */
    public function saalgenerate()
    {
        $count = 0;
        $idsaal = 3;
        for ($i = 0; $i < $idsaal;) {
            while ($count < $idsaal) {
                $i++;
                $userfs = "SELECT sitze FROM saal_plätze WHERE id =$i; ";
                $querys = mysqli_query($this->connection, $userfs);
                $rows = mysqli_fetch_assoc($querys);
                $id = $rows['sitze'];
                $count++;

                echo $id . " ";

                for ($p = 1; $p <= $id; $p++) {

                    $sql = "INSERT INTO saal (platz_nummer, user_id_fs, film_id_fs, saal_plätze_id_fs, besetzt) VALUES ($p,NULL,$i,$i,'f');";
                    $result = $this->connection->query($sql);

                    if (!$result) {
                        echo mysqli_error($this->connection);
                        die($this->connection->error);
                    }
                }
                echo $i;
                $p = 1;
            }
        }
        header("Location:http://localhost/php/Admin/Admin.html");
    }
    /**
     * saalupdate
     *
     * @param  mixed $num
     * @return void
     */
    public function saalupdate($num)
    {
        $sql = "UPDATE saal SET user_id_fs=NULL , besetzt='f' WHERE besetzt ='t' AND saal_plätze_id_fs = '$num';";
        $result = $this->connection->query($sql);

        if (!$result) {
            echo mysqli_error($this->connection);
            die($this->connection->error);
        }
    }
    /**
     * checkuser
     *
     * @return void
     */
    public function checkuser()
    {
        $result = $this->connection->query("SELECT vorname FROM user WHERE vorname = '$this->firstname'");
        if ($result->num_rows == 0) {
            $result2 = $this->connection->query("SELECT nachname FROM user WHERE nachname = '$this->lastname'");
            if ($result2->num_rows == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        $this->connection->close();
    }
}
