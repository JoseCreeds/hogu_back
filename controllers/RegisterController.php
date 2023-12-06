<?php
// include '../config/app.php';

class RegisterController
{
    public $Conn;


    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->Conn = $db->getConnection();
    }

    public function registration($fname, $lname, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $register_query = "INSERT INTO users(fname, lname, email, password, is_admin, status, solde, second_status) VALUES (:fname, :lname, :email, :password, 0, 'disabled', 500, 'disabled')";
        $result = $stmt = $this->Conn->prepare($register_query);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        return $result;
    }

    public function checkDataEmpty($fname, $lname, $email, $password, $c_password)
    {
        if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($c_password)) {
            return true;
            echo "Aucun champs vide";
        } else {
            return false;
        }
    }

    public function isUserExists($email)
    {
        $checkUser_query = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->Conn->prepare($checkUser_query);
        $stmt->bindParam(':email', $email,  PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->rowCount();

        return $result > 0;
    }

    public function confirmPassword($password, $c_password)
    {
        if ($password == $c_password) {
            return true;
        } else {
            return false;
        }
    }
}
