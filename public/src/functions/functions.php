<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function verifyExistsUser($id) {
        require "../config/connect-db.php";
        $sqlExistsUser = "SELECT user_name FROM users_tb WHERE user_name = '$id'";
        if ($conn->query($sqlExistsUser)->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function register($user_name, $password_user, $token_user, $date_user) {
        require "../config/connect-db.php";
        $sqlRegisterUser = "INSERT INTO users_tb (user_name, password_user, token_user, date_user) VALUES ('$user_name', '$password_user', '$token_user', '$date_user')";
        $conn->query($sqlRegisterUser);
    }

    function dadosUserExists($token) {
        require "./src/config/connect-db.php";

        $sql = "SELECT id_user FROM users_tb WHERE token_user = '$token'";

        $id = $conn->query($sql)->fetch_assoc()['id_user'];

        $sql2 = "SELECT * FROM user_datas_tb WHERE forward_key_userData = '$id'";

        if ($conn->query($sql2)->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
?>