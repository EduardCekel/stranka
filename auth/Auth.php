<?php

class Auth
{
    public $isLogged = false;
    
    public function __construct()
    {
        if (isset($_POST['pEmail']) && isset($_POST['pHeslo']))
        {
            $this->login($_POST['pEmail'], $_POST['pHeslo']);
        }
        if (isset($_SESSION['logged']))
        {
            $this->isLogged = true;
        }

        if (isset($_GET['odhlas']))
        {
            $this->logout();
        }
    }

    public function login($name, $heslo)
    {
        if ($name == "admin" && $heslo == "admin")
        {
            $this->isLogged = true;
            $_SESSION['logged'] = true;
        }
        else {
            $this->logout();
        }
        header("Location: ../index.php");
    }

    public function logout()
    {
        $this->isLogged = false;
        unset($_SESSION['logged']);
        header("Location: index.php");
    }
}
