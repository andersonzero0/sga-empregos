<?php
session_start();
if (isset($_GET['submit'])) {
    require "../config/connect-db.php";
    require "../functions/functions.php";

    $cargo = $_GET['cargo'];
    $empresa = $_GET['empresa'];
    $local = $_GET['local'];
    $turno = $_GET['turno'];
    $qnt_vaga = $_GET['qnt_vaga'];
    $descricao_vaga = $_GET['descricao_vaga'];
    $id = tokenForID($_SESSION['tokenUser']);

    $sqlInsertVaga = "INSERT INTO vagas_tb(forward_key_vaga, cargo_vaga, empresa_vaga, local_vaga, turno_vaga, qnt_vaga, descricao_vaga) VALUES($id, '$cargo', '$empresa', '$local', '$turno', '$qnt_vaga', '$descricao_vaga')";

    $conn->query($sqlInsertVaga);
}
