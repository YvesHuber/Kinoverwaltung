<?php

class Show{

    private $saal_nr;
    private $connection;
    public function __construct($connection, $saal_nr)
    {
        $this->saal_nr = $saal_nr;
        $this->connection = $connection;
    }

    public function seats_of_saal()
    {
        $saal_number = $this->saal_nr;

        $userfs = "SELECT sitze FROM saal_plätze WHERE id = $saal_number;";
        $querys = mysqli_query($this->connection, $userfs);
        $rows = mysqli_fetch_assoc($querys);
        $id = $rows['sitze'];

        $bool = "SELECT besetzt FROM saal WHERE besetzt='t';";
        $query_bool = mysqli_query($this->connection, $bool);
        $row = $this->connection->fetch_assoc();
        $bool_official = $row['besetzt'];

        for ($p = 1; $p <= $id; $p++) {
            if($bool_official[$p]['besetzt'] == "t"){
                echo "<img style = width = 4% height = 4% src = /Bilder/stuhl.svg>";
                echo "<t class = besetzt>" . $p . "</t>";
            }else{
                echo "<img style = width = 4% height = 4% src = /Bilder/stuhl.svg>";
                echo "<t class = seatid>" . $p . "</t>";
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
    public function choose($id)
    {
        $userfs = "SELECT sitze FROM saal_plätze WHERE id =$id; ";
                $querys = mysqli_query($this->connection, $userfs);
                $rows = mysqli_fetch_assoc($querys);
                $id = $rows['sitze'];
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