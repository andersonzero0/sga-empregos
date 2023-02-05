<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "sga_empregos_db";

    $conn = new mysqli($hostname, $username, $password, $db);
    
    if ($conn->connect_error) {
        echo "Falha ao conectar! Erro: ".($conn->connect_error);
    }
?>