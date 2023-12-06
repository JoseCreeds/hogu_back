<?php

class DatabaseConnection
{
    public $db_host;
    public $user_name;
    public $password;
    public $db_name;
    public ?\PDO $Conn = null;

    public function __construct(
        $db_host = "localhost",
        $user_name = "root",
        $password = "",
        $db_name = "poo-auth",

    ) {

        $this->db_host = $db_host;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->db_name = $db_name;
    }
    public function getConnection(): \PDO
    {
        try {
            if ($this->Conn === null) {
                $dbConn = new PDO("mysql:host={$this->db_host}; dbname={$this->db_name}", $this->user_name, $this->password);
                $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if (!$dbConn) {
                    die('Something is going wrong');
                }
            }
            // echo "Database connected successifully";

            return $this->Conn = $dbConn;
        } catch (PDOException $e) {
            die('Connection failed') . $e->getMessage();
            return $this->Conn = null;
        }
    }
}


// class DatabaseConnection
// {
//     public ?\PDO $database = null;

//     public function getConnection(): \PDO
//     {
//         if ($this->database === null) {
//             $this->database = new \PDO('mysql:host=localhost;dbname=blog_mvc_php;charset=utf8', 'root', '');
//         }

//         return $this->database;
//     }
// }
