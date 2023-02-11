<?php
session_start();
require "../functions/functions.php";

if(isset($_POST['submit'])) {
    $fullName = test_input($_POST['fullName']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $type_user = test_input($_POST['type_user']);
    $linkRedeSocial = test_input($_POST['link']);

    /* upload file - start */
    $target_dir = "../../assets/images/";
    $target_file = $target_dir . basename($_FILES["imgPerfil"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES["imgPerfil"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgPerfil"]["tmp_name"], $target_file)) {

            $imgPerfil = htmlspecialchars( basename( $_FILES["imgPerfil"]["name"]));

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    /* ++++++++++++ */

    $target_dirPDF = "../../assets/pdf/";
    $target_filePDF = $target_dirPDF . basename($_FILES["curriculoPDF"]["name"]);
    $uploadOkPDF = 1;
    $FileTypePDF = strtolower(pathinfo($target_filePDF,PATHINFO_EXTENSION));

    if ($_FILES["curriculoPDF"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOkPDF = 0;
    }

    if($FileTypePDF != "pdf") {
        echo "Sorry, only PDF files are allowed."; 
        $uploadOkPDF = 0;
    }

    if ($uploadOkPDF == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["curriculoPDF"]["tmp_name"], $target_filePDF)) {

            $curriculoPDF = htmlspecialchars( basename( $_FILES["curriculoPDF"]["name"]));

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    /* upload file - end */

    $_SESSION['fullName'] = $fullName;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['type_user'] = $type_user;
    $_SESSION['linkRedeSocial'] = $linkRedeSocial;
    $_SESSION['imgPerfil'] = $imgPerfil;
    $_SESSION['curriculoPDF'] = $curriculoPDF;

    header("location: ../models/dadosUserModels.php");
    
} else {
    header("location: ../../index.html");
}
?>