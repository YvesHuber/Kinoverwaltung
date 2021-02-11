<?php
session_start();
require_once('sitzplatz.class.php');
require_once('../connection.class.php');

$firstname = ($_POST['txt_uname']);
$lastname = ($_POST['txt_pwd']);
$saal = $_SESSION['saal'];
$place = ($_POST['txt_place']);
$film = $_SESSION['film'];
echo $firstname;
echo $lastname;
$user = new sitzplatz($firstname,$lastname,$saal,$place,$film,$connection);
/*$user->Registeruser();*/
$user->Register_Place();
echo "done";

session_destroy();