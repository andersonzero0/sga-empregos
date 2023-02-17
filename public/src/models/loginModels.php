<?php
session_start();

if (isset($_SESSION['userNameClientLogin'])) {

    require "../config/connect-db.php";

    $userNameClient = $_SESSION['userNameClientLogin'];
    $passwordClient = $_SESSION['passwordClientLogin'];

    $sql = "SELECT * FROM users_tb WHERE user_name = '$userNameClient'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if($row['password_user'] == $passwordClient) {

            $_SESSION['tokenUser'] = $row['token_user'];

            header('location: redirectUser.php');

        } else {
            session_destroy();
            echo "password incorrect";
        }

    } else {
        session_destroy();
        echo "user not found";

    }
} else {
    session_destroy();
    header('location: ../../index.html');

}

?>