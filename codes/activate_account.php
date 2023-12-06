<?php
include '../config/app.php';
include '../controllers/ManageUserController.php';
// include '../codes/authentication.php';


//This is to validate users's account after they were been registred
// if (isset($_POST['activate_account_btn'])) {

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $userId = $_GET['id'];
    $validate_register = new ManageUserController();

    $validate_register->activateUserAccount($userId);

    // echo 'Done';
    echo returnStatusError(false);

}
// }