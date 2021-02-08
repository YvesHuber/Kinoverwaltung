<?php
require_once('login.class.php');

        $username = ($_POST['txt_uname']);
        $password = ($_POST['txt_pwd']);
        echo "no user";
        $user = new Login($username, $password);
        echo "user";
        $user -> Login_Admin;
        echo "function";