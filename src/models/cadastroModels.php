<?php
    session_start();
    require "../functions/functions.php";

    if (isset($_SESSION["userNameClient"]) && 
    isset($_SESSION["passwordClient"]) && 
    isset($_SESSION["date"])) {

        $userNameClient = $_SESSION['userNameClient'];

        if(verifyExistsUser($userNameClient)) {
            /*  */
        } else {
            /*  */
        }
        
    }
?>