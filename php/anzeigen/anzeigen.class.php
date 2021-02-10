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

                echo $id . " ";

                for ($p = 1; $p <= $id; $p++) {

                    echo $p;
                }
                echo $i;
                $p = 1;
            }
        }
    }
}