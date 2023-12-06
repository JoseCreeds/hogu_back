<?php
include '../config/app.php';
include '../controllers/ManageUserController.php';
// include '../codes/authentication.php';

//This is to authorize users for the last status
// if (isset($_POST['second_status_btn'])) {

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $userId = $_GET['id'];
    $validate_register = new ManageUserController();

    $validate_register->authorizeUser($userId);

    // echo 'Done';
    echo returnStatusError(false);
}
// }
