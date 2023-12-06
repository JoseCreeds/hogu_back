<?php
include '../config/app.php';
include '../controllers/ManageUserController.php';
// include '../codes/authentication.php';

//This is to update users's solde
// if (isset($_POST['update_solde_btn'])) {

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $userId = $_GET['id'];
    $new_solde = htmlspecialchars($_POST['solde']);

    $update_solde = new ManageUserController();

    $update_solde->updateSolde($userId, $new_solde);

    // echo 'Done';
    echo returnStatusError(false);
}
// }
