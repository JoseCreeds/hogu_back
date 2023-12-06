<?php
// session_start();

// include '../controllers/AuthenticationController.php';

class adminController
{

    public function __construct()
    {
        $this->checkIsAuthorize();
    }

    private function checkIsAuthorize()
    {
        if (isset($_SESSION['authenticated']) && isset($_SESSION['auth_role'])) {

            if ($_SESSION['auth_role'] != 1) {
                echo 'you are not a admin';
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

$admin = new adminController;
