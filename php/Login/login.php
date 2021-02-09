<?php
require_once('login.class.php');
require_once('../connection.class.php');
$username = ($_POST['txt_uname']);
$password = ($_POST['txt_pwd']);
$user = new Login($username, $password);
$user->compare_values();
/*
if ($check == true) {
    header("localhost/php/Admin/Admin.html");
    exit;
} elseif ($check == false) {
    header("localhost/index.html");
}
*/