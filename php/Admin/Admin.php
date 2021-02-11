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
$zahl = ($_POST['zahl']);
$user = new sitzplatz($firstname,$lastname,$saal,$places,$film,$connection);
$vis = new Visualise($connection);
$Admin = new Admin($connection);
/*
if ($saal != "" && $places != ""){
    $Admin->Register_saal($saal,$places);
}*/
if (isset($_POST["saalgen"])) {

    $user->saalgenerate();
}
if (isset($_POST["saalup"])) {

    $user->saalupdate();
}
if (isset($_POST["sitze"])) {

    $vis->sitze();
}
if (isset($_POST["sitzeshow"])){

    $vis->choose($zahl);
    
}
if ($film != "" && $time != "") {
    $Admin->Register_film($film, $time);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/andrew.css">
</head>

<body>
    <form action="Admin.html">
        <input type="submit" value="Back to admin page" class="adminBack"/>
    </form>
</body>

</html>