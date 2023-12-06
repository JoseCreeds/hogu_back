<?php

class AuthenticationController
{
    public function __construct()
    {
        $this->checkIsLoggedIn();
    }

    private function checkIsLoggedIn()
    {
        if (!isset($_SESSION['authenticated'])) {
            // redirect("Login to Access the page", "login.php");
            // echo 'Login to Access the page';
            header("Location:login.php");
            return false;
        } else {
            return true;
        }
    }
}

$authenticated = new AuthenticationController;
