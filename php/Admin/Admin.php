<?php
require_once('Admin.class.php');
require_once('../connection.class.php');

$saal = ($_POST['txt_saal']);
$places = ($_POST['txt_sitze']);
$film = ($_POST['txt_film']);
$time = ($_POST['txt_time']);

$Admin = new Admin($connection);
/*
if ($saal != "" && $places != ""){
    $Admin->Register_saal($saal,$places);
}*/
if ($film != "" && $time != "") 
{
    $Admin->Register_film($film,$time);
}