<?php
session_start();
if (isset($_GET['submit'])) {
    require "../config/connect-db.php";
    require "../functions/functions.php";

    $cargo = addslashes($_GET['cargo']);
    $empresa = addslashes($_GET['empresa']);
    $local = addslashes($_GET['local']);
    $turno = addslashes($_GET['turno']);
    $qnt_vaga = $_GET['qnt_vaga'];
    $descricao_vaga = addslashes($_GET['descricao_vaga']);
    $id = tokenForID($_SESSION['tokenUser']);

    $sqlInsertVaga = "INSERT INTO vagas_tb(forward_key_vaga, cargo_vaga, empresa_vaga, local_vaga, turno_vaga, qnt_vaga, descricao_vaga) VALUES($id, '$cargo', '$empresa', '$local', '$turno', $qnt_vaga, '$descricao_vaga')";

    $conn->query($sqlInsertVaga);

    header("location: ../../home.php");
}
