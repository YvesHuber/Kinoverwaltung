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

    public function compare_values()
    {

        if (file_exists($this->save)) {
            $json = file_get_contents($this->save);
        }
        $decoded = json_decode($json, true);

        for ($i = 0; $i < count($decoded); $i++) {
            if ($this->username == ($decoded)[$i][0]['Adminusername'] && $this->password == ($decoded)[$i][0]['Adminpassword']) {
                header("Location: http://localhost/php/Admin/Admin.html");
                exit;
                echo "You are now logged in Welcome " . $this->username;


            }
            else {
                header("Location: http://localhost/index.html");
            }
        }
    }
}
