<?php
    session_start();
    
    require_once "../config/connect-db.php";
    require_once "../functions/functions.php";

    $userNameClient = test_input($_POST['userNameClient']);
    $passwordClient = md5(sha1(test_input($_POST['passwordClient'])));
    $date = date('d/m/Y');
    
    if (isset($userNameClient) && isset($passwordClient)) {
        
        $_SESSION['userNameClient'] = $userNameClient;
        $_SESSION['passwordClient'] = $passwordClient;
        $_SESSION['date'] = $date;

        header("location: ../models/cadastroModels.php");

    } else {

        header("location: ../../cadastro.php");

    }
?>