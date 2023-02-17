<?php
    session_start();
    
    require_once "../functions/functions.php";

    if (isset($_POST['submit'])) {

        $userNameClient = test_input($_POST['userNameClient']);
        $passwordClient = md5(sha1(test_input($_POST['passwordClient'])));
        
        if (isset($userNameClient) && isset($passwordClient)) {
            
            $_SESSION['userNameClientLogin'] = $userNameClient;
            $_SESSION['passwordClientLogin'] = $passwordClient;

            header("location: ../models/loginModels.php");

        } else {

            header("location: ../../login.php");

        }
    } else {

        header("location: ../../index.html");

    }
    
?>