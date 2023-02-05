<?php
    session_start();
    include "../config/connect-db.php";
    require "../functions/functions.php";

    if (isset($_SESSION["userNameClient"]) && 
    isset($_SESSION["passwordClient"]) && 
    isset($_SESSION["date"])) {

        $userNameClient = $_SESSION['userNameClient'];

        if (verifyExistsUser($userNameClient)) {
            echo "Existe usuário!";
        } else {
            echo "Não Existe Usuário!";
        }
        
    }
?>