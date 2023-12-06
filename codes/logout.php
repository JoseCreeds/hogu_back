<?php

include '../config/app.php';
include '../controllers/LoginController.php';


// if (isset($_POST['logout_btn'])) {
$checkedLoggedOut = $auth->logout();
if ($checkedLoggedOut) {
    // redirect("Logged Out Successfully", "login.php");
    echo returnStatusError(false);

}
// }
