<?php

include '../config/app.php';
include '../controllers/RegisterController.php';


//This is to put first new registred users in a waiting table 
// if (isset($_POST['register_btn'])) {

$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirm_password = htmlspecialchars($_POST['confirm_password']);

$register = new RegisterController();

$noEmpty_data = $register->checkDataEmpty($fname, $lname, $email, $password, $confirm_password);


if ($noEmpty_data) {
    // echo "No empty field";
    echo returnStatusError(true);
} else {

    $result_password = $register->confirmPassword($password, $confirm_password);

    if ($result_password) {
        $result_user = $register->isUserExists($email);

        if ($result_user) {
            // redirect("Email already exists", "register.php");
            // echo "Email already exists";
            echo returnStatusError(true);

        } else {
            $register_query = $register->registration($fname, $lname, $email, $password);

            if ($register_query) {
                // redirect("Registred successfully", "login.php");
                // echo "Registred";
                echo returnStatusError(false);
            } else {
                // redirect("Something went wrong", "register.php");
                echo returnStatusError(true);

            }
        }
    } else {
        // redirect("Password and Confirm_password Does not match", "register.php");
        // echo "Password and Confirm_password Does not match";
        echo returnStatusError(true);

    }
}
// }