<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function verifyExistsUser($user_name) {
        require_once "../config/connect-db.php";
        $sqlExistsUser = "SELECT user_name FROM users_tb WHERE user_name = '$id'";
        if ($conn->query($sqlExistsUser)->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
?>