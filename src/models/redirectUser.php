<?php
session_start();
require_once "../config/connect-db.php";

if(isset($_SESSION['tokenUser'])) {

    $token = $_SESSION['tokenUser'];

    $sql = "SELECT type_user FROM users_tb INNER JOIN user_datas_tb ON users_tb.id_user = user_datas_tb.forward_key_userData WHERE token_user = '$token'";

    $type_user = $conn->query($sql)->fetch_assoc()['type_user'];

    $_SESSION['type_user'] = $type_user;
    
    header('location: ../../home.php');

} else {
    header("location: ../../index.html");
}

?>