<?php


class Visualise
{
    public function __construct($connection)
    {
        $this->connection = $connection;
    }


    public function sitze()
    {
        $count = 0;
        $idsaal = 3;
        for ($i = 1; $i <= $idsaal;$i++) {
            echo $i;
            $userfs = "SELECT sitze FROM saal_plätze WHERE id = $i ; ";
            $querys = mysqli_query($this->connection, $userfs);
            $rows = mysqli_fetch_assoc($querys);
            $id = $rows['sitze'];

            $bool = "SELECT platz_nummer, saal_plätze_id_fs FROM saal WHERE besetzt = 't' AND saal_plätze_id_fs = $i ;";
            $query_bool = mysqli_query($this->connection, $bool);
            $row = mysqli_fetch_assoc($query_bool);
            var_dump($row);

            /*$id_saal_check = "SELECT saal_plätze_id_fs FROM saal WHERE besetzt = 't';";
                $query_check = mysqli_query($this->connection, $id_saal_check);
                $row_id = mysqli_fetch_assoc($query_check);
                var_dump($row_id);*/

            for ($p = 1; $p <= $id; $p++) {
                if ($row['saal_plätze_id_fs'] == "$i" && $row['platz_nummer'] == "$p") {

                    echo "<img style = width = 4% height = 4% src = ../../Bilder/stuhl.svg>";
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
    public function choose($num)
    {
        $userfs = "SELECT sitze FROM saal_plätze WHERE id = $num; ";
        $querys = mysqli_query($this->connection, $userfs);
        $rows = mysqli_fetch_assoc($querys);
        $id = $rows['sitze'];
        for ($p = 1; $p <= $id; $p++) {

            echo "<img style = width = 4% height = 4% src = ../../Bilder/stuhl.svg>";
            echo "<t class = seatid>" . $p . "</t>";
            if ($p % 10 == 0) {
                echo "<br>";
            }
        }
    }
}
