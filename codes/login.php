<?php

include '../config/app.php';
include '../controllers/LoginController.php';

// if (isset($_POST['login_btn'])) {
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$auth = new LoginController();

$noEmpty_data = $auth->checkDataEmpty($email, $password);

if ($noEmpty_data) {
    // echo "No empty field";
    echo returnStatusError(true);
} else {

    $result_user = $auth->login($email);

    if ($result_user) {
        if (password_verify($password, $result_user['password'])) {

            $auth->userAuthentication($result_user);

            $jsonData = json_encode([
                'fname'=>$result_user['fname'],
                'lname'=>$result_user['lname'],
                'email'=>$result_user['email'],
                'is_admin'=>$result_user['is_admin'],
                'status'=>$result_user['status'],
                'second_status'=>$result_user['second_status'],
            ]);
            // if ($result_user['is_admin'] == 1) {
                // header("Location:admindashbord.php");
                // echo 'Admin Connected !';
            //     return $jsonData;
            // } else {
                // header("Location:acceuil.php");
                // echo 'User Connected !';
                echo returnStatusError($jsonData);
            // }
        } else {

            // echo "Bad credentials";
            echo returnStatusError(true);
        }
    } else {
        // redirect("Bad credentials", "login.php");
        // echo "Bad credentials";
        echo returnStatusError(true);
    }
}
// }