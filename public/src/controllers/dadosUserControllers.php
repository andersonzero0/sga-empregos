<?php
session_start();
require "../functions/functions.php";

if(isset($_POST['submit'])) {
    $fullName = test_input($_POST['fullName']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $type_user = test_input($_POST['type_user']);
    $linkRedeSocial = test_input($_POST['link']);

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
    $_SESSION['curriculoPDF'] = $curriculoPDF;

    header("location: ../models/dadosUserModels.php");
    
} else {
    header("location: ../../index.html");
}
?>