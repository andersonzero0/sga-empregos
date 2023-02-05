<?php
    session_start();
    require_once "../functions/functions.php";

    if (isset($_SESSION["userNameClient"]) && 
    isset($_SESSION["passwordClient"]) && 
    isset($_SESSION["date"])) {

        $userNameClient = $_SESSION['userNameClient'];
        $passwordClient = $_SESSION['passwordClient'];
        $dateUser = $_SESSION['date'];
        $tokenUser = md5(sha1($userNameClient . $passwordClient . $dateUser));

        if(!verifyExistsUser($userNameClient)) {
            register($userNameClient, $passwordClient, $tokenUser, $dateUser);
        } else {
            echo 0;
        }
        
    }
?>