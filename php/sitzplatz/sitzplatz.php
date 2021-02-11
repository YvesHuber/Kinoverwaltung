<?php
session_start();
require_once('sitzplatz.class.php');
require_once('../connection.class.php');
$firstname = ($_POST['txt_uname']);
$lastname = ($_POST['txt_pwd']);
$saal = $_SESSION['saal'];
$place = ($_POST['txt_place']);
$film = $_SESSION['film'];
$user = new sitzplatz($firstname, $lastname, $saal, $place, $film, $connection);


$check = $user->checkuser();
if ($check = true) {
    $user->Registeruser();
    $user->Register_Place();
} else {
    $user->Register_Place();
}

session_destroy();
