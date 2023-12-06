<?php
session_start();

include_once 'DatabaseConnection.php';
// include '../codes/authentication.php';

$db = new DatabaseConnection;


//This is for notifying a specify message if something is wrong
// function redirect($massage, $page)
// {
//     $_SESSION['massage'] = "$massage";
//     header("Location:$page");
//     exit(0);
// }

//this is to check the error status
function returnStatusError($status)
{
    return json_encode([ 'status' => $status ]);
    
}


