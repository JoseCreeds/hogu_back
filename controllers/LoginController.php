<?php

// include '../config/app.php';

class LoginController
{
    public $Conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->Conn = $db->getConnection();
    }


    public function checkDataEmpty($email, $password)
    {
        if (empty($email) || empty($password)) {

            return true;
            echo "Aucun champs vide";
        } else {

            return false;
        }
    }

    public function login($email)
    {
        $checkUser_query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->Conn->prepare($checkUser_query);
        $statement->bindParam(':email', $email,  PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function userAuthentication($result)
    {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_role'] = $result['is_admin'];
        $_SESSION['auth_status'] = $result['status'];
        $_SESSION['auth_second_status'] = $result['second_status'];
        $_SESSION['auth_user'] = [
            'user_id' => $result['id'],
            'user_fname' => $result['fname'],
            'user_lname' => $result['lname'],
            'user_email' => $result['email'],
        ];
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['authenticated']) === TRUE) {
            redirect('You are already Logged In', 'index.php');
        } else {
            return false;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['authenticated']) === TRUE) {

            unset($_SESSION['authenticated']);
            unset($_SESSIION['auth_role']);
            unset($_SESSION['auth_user']);

            return true;
        } else {
            return false;
        }
    }
}
