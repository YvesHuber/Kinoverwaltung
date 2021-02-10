<?php


class visualise 
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

                for ($p = 1; $p <= $id; $p++) {

                    echo "<img style = width = 4% height = 4% src = ../../Bilder/stuhl.svg>";
                    echo "<t class = seatid>". $p ."</t>";
                    if ($p % 10 == 0){
                        echo "<br>";
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