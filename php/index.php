<?php
        $username = ($_POST['txt_uname']);
        $password = ($_POST['txt_pwd']);
        if (file_exists("data.json")) {
            $json_already = file_get_contents("data.json");
        }
        $json = json_decode($json_already);

        $array[] = array(

            'firstname' => $username,
            'name' => $password

        );

        $json[] = $array;
        $json_decoded = json_encode($json);

        file_put_contents("data.json", $json_decoded);
        echo "Registerd new user ". $username;