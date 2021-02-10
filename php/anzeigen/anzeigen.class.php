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
        for ($i = 0; $i < $idsaal;) {
            while ($count < $idsaal) {
                $i++;
                $userfs = "SELECT sitze FROM saal_plätze WHERE id =$i; ";
                $querys = mysqli_query($this->connection, $userfs);
                $rows = mysqli_fetch_assoc($querys);
                $id = $rows['sitze'];
                $count++;

                $bool = "SELECT besetzt FROM saal WHERE besetzt='t';";
                $query_bool = mysqli_query($this->connection, $bool);
                $row = $this->connection->fetch_assoc();
                $bool_official = $row['besetzt'];

                for ($p = 1; $p <= $id; $p++) {

                    if ($bool_official[$p]['besetzt'] == "t") {
                        echo "<img style = width = 4% height = 4% src = /Bilder/stuhl.svg>";
                        echo "<t class = besetzt>" . $p . "</t>";
                    } else {
                        echo "<img style = width = 4% height = 4% src = /Bilder/stuhl.svg>";
                        echo "<t class = seatid>" . $p . "</t>";
                    }
                }
                echo "<br>";
                echo "<br>";
                echo "<br>";
                $p = 1;
            }
        }
    }
}
