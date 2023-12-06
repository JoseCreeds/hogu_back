<?php

class ManageUserController
{
    public $Conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->Conn = $db->getConnection();
    }

    //This is to get all users wating in the waiting_user table 
    //that they will be display on a view manage by the admin
    public function users()
    {
        $waiting_users = "SELECT * FROM users";
        $statement = $this->Conn->prepare($waiting_users);
        $statement->execute();

        $all_waiting_users = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $all_waiting_users;
    }

    public function activateUserAccount($userId)
    {
        // Implement user authorization logic
        // Put the user's status to enabled
        $activation_query = "UPDATE users SET status = 'enabled' WHERE id = :userId";
        $stmt = $this->Conn->prepare($activation_query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

    }

    public function authorizeUser($userId)
    {
        // Implement user authorization logic
        // Put the user's second_status to enabled
        $allow_user_query = "UPDATE users SET second_status = 'enabled' WHERE id = :userId";
        $stmt = $this->Conn->prepare($allow_user_query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

    }

    public function updateSolde($userId, $new_solde)
    {
        $register_query = "UPDATE users SET solde = :new_solde WHERE id = :userId";
        $stmt = $this->Conn->prepare($register_query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':new_solde', $new_solde);
        $stmt->execute();

    }
}
