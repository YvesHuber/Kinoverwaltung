<?php

class Login
{
    private $username;
    private $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->save = "data.json";
    }

    public function Login_Admin()
    {
        $jsondecode = file_get_contents($this->save);
        $decoded = json_decode($jsondecode, true);
        for ($i = 0; $i < count($decoded); $i++) {


            if ($this->username == ($decoded)[$i][0]['Adminusername'] && $this->password == ($decoded)[$i][0]['Adminpassword']) {
                echo "logged in";
            } else {
                echo "ACCES DINED";
            }
        }
    }
}
