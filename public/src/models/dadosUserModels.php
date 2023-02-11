<?php
session_start();

if(isset($_SESSION['fullName']) && isset($_SESSION['tokenUser'])) {
    require "../config/connect-db.php";
    require "../functions/functions.php";

    $fullName = $_SESSION['fullName'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $type_user = $_SESSION['type_user'];
    $linkRedeSocial = $_SESSION['linkRedeSocial'];
    $imgPerfil = $_SESSION['imgPerfil'];
    $curriculoPDF = $_SESSION['curriculoPDF'];
    $id = tokenForID($_SESSION['tokenUser']);

    $sql = "INSERT INTO user_datas_tb(forward_key_userData, full_name_userData, email_address_userData, phone_number_userData, type_user, external_link_userData, link_image_profile_userData, link_curriculum_vitae_userData) VALUES ('$id', '$fullName', '$email', '$phone', '$type_user', '$linkRedeSocial', '$imgPerfil', '$curriculoPDF')";

    $conn->query($sql);

    header("location: ../../home.php");
}
?>