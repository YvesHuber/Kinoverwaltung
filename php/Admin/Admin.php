<?php
echo "<link rel=stylesheet href=/css/style.css>";
require_once('Admin.class.php');
require_once('../connection.class.php');
require_once('../sitzplatz/sitzplatz.class.php');
require_once('../anzeigen/anzeigen.class.php');
$saal = ($_POST['txt_saal']);
$places = ($_POST['txt_sitze']);
$film = ($_POST['txt_film']);
$time = ($_POST['txt_time']);
$user = new sitzplatz($firstname,$lastname,$saal,$places,$film,$connection);
$vis = new Visualise($connection);
$Admin = new Admin($connection);
/*
if ($saal != "" && $places != ""){
    $Admin->Register_saal($saal,$places);
}*/
if (isset($_POST["saalgen"])){

    $user->saalgenerate();
}
if (isset($_POST["saalup"])){

    $user->saalupdate();

}
if (isset($_POST["sitze"])){

    $vis->sitze();
    
}
if ($film != "" && $time != "") {
    $Admin->Register_film($film, $time);
}
