<?php
require_once('login.class.php');
        $username = ($_POST['txt_uname']);
        $password = ($_POST['txt_pwd']);
        $user = new Login($username, $password);
        $check = $user -> compare_values();
        if ($check == true)
        {
            
            //Header to new site you are now logged in
        }
        elseif ($check == false) {
            header("localhost/index.html");
            echo "ERROR";
        }