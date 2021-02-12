<?php


class Visualise
{
    public function __construct($connection)
    {
        $this->connection = $connection;
    }


    public function sitze()
    {
        $idsaal = 3;
        for ($i = 1; $i <= $idsaal; $i++) {
            echo $i;
            $userfs = "SELECT sitze FROM saal_plätze WHERE id = $i ; ";
            $querys = mysqli_query($this->connection, $userfs);
            $rows = mysqli_fetch_assoc($querys);
            $id = $rows['sitze'];

            $bool = "SELECT platz_nummer, saal_plätze_id_fs FROM saal WHERE besetzt = 't' AND saal_plätze_id_fs = $i ;";
            $query_bool = mysqli_query($this->connection, $bool);
            $row = mysqli_fetch_assoc($query_bool);
            var_dump($row);

            for ($p = 1; $p <= $id; $p++) {
                if ($row['saal_plätze_id_fs'] == "$i" && $row['platz_nummer'] == "$p") {

                    echo "<img style = width = 4% height = 4% src = ../../Bilder/stuhl.svg>";;
                    echo "<t style='color: red;'>" . $p . "</t>";
                    if ($p % 10 == 0) {
                        echo "<br>";
                    }
                } else {
                    echo "<img style = width = 4% height = 4% src = ../../Bilder/stuhl.svg>";
                    echo "<t class = seatid style='color: white;'>" . $p . "</t>";
                    if ($p % 10 == 0) {
                        echo "<br>";
                    }
                }
            }
            echo "<br>";
            echo "<br>";
            echo "<br>";
            $p = 1;
        }
    }

    /**
     * choose
     *
     * @param  mixed $num
     * @return void
     */
    public function choose($num)
    {
        echo "<br>";
        $userfs = "SELECT sitze FROM saal_plätze WHERE id = $num ; ";
        $querys = mysqli_query($this->connection, $userfs);
        $rows = mysqli_fetch_assoc($querys);
        $id = $rows['sitze'];

        $bool = "SELECT platz_nummer, saal_plätze_id_fs FROM saal WHERE besetzt = 't' AND saal_plätze_id_fs = $num ;";
        $query_bool = mysqli_query($this->connection, $bool);
        $row = mysqli_fetch_assoc($query_bool);
        //var_dump($row);

        for ($p = 1; $p <= $id; $p++) {
            echo "<img class = 'seat' src = ../../Bilder/stuhl.svg>";
            if ($row['saal_plätze_id_fs'] == "$num" && $row['platz_nummer'] == "$p") {
                echo "<t style='color: red;'>" . $p . "</t>";
            } else {
                echo "<t class = seatid style='color: white;'>" . $p . "</t>";
            }
            if ($p % 10 == 0) {
                echo "<br>";
            }
        }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        $p = 1;
    }


    public function autodelete()
    {
        $film = "SELECT id from film LIMIT 1;";


        $querys = mysqli_query($this->connection, $film);
        $rows = mysqli_fetch_assoc($querys);
        $id = $rows['id'];


        $filmm = "SELECT id FROM `film` WHERE id = 3;";
        $querym = mysqli_query($this->connection, $filmm);
        $rowm = mysqli_fetch_assoc($querym);
        $max = $rowm['id'];


        while ($id <= $max) {
            //get time
            $idtime = "SELECT zeit from film WHERE id = '$id';";
            $querry = mysqli_query($this->connection, $idtime);
            $row = mysqli_fetch_assoc($querry);
            $time = $row['zeit'];

            //localtime to seconds
            date_default_timezone_set('Europe/Zurich');

            $timern = date('H:i');

            //compare
            if ($timern >= $time) {
                $new = new sitzplatz("", "", "", "", "", $this->connection);
                $new->saalupdate($id);
            }
            $id++;
        }
    }
}
