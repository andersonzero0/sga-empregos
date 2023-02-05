<?php
    session_start();
    require "../config/connect-db.php";
    $userNameClient = test_input($_POST['userNameClient']);
    $passwordClient = md5(sha1(test_input($_POST['passwordClient'])));

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $date = date('d/m/Y');
    
    if (isset($userNameClient) && isset($passwordClient)) {
        $_SESSION['userNameClient'] = $userNameClient;
        $_SESSION['passwordClient'] = $passwordClient;
        $_SESSION['date'] = $date;
        header("location: ../models/loginModels.php");
    } else {
        header("location: ../../login.php");
    }
?>