<?php
require_once('sitzplatz.class.php');
require_once('../connection.class.php');

$firstname = ($_POST['txt_uname']);
$lastname = ($_POST['txt_pwd']);
$saal = ($_POST['txt_saal']);
$place = ($_POST['txt_place']);
$film = ($_POST['txt_film']);

$user = new sitzplatz($firstname,$lastname,$saal,$place,$film,$connection);

/*$user->Registeruser();*/
$user->Register_Place();
echo "done";