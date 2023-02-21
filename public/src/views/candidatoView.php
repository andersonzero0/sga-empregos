<main class="mainCandidato">
    <div>

<?php

if ($_SERVER['PHP_SELF'] == '/sga-empregos/public/src/views/candidatoView.php') {
    header('location: ../../index.html');
}

require "src/config/connect-db.php";
require_once "src/functions/functions.php";

$sqlCode = "SELECT * FROM vagas_tb ORDER BY id_vaga DESC";
$result = $conn->query($sqlCode);

if($result->num_rows == 0) {
?>

<p>Nao ha vagas</p>

<?php
} else {

    if (isset($_GET['subsVaga_btn'])) {
        $idVaga = $_GET['id_vaga'];
        $idUser = tokenForID2($_SESSION['tokenUser']);
        $data_regist = date("d/m/Y");

        $sqlRegisCand = "INSERT INTO registrocandit_tb (forward_key_user, forward_key_vaga, stage_vaga, data_regist) VALUES ($idUser, $idVaga, 'PENDENTE', '$data_regist')";
        $conn->query($sqlRegisCand);
        header("location: home.php");
    }

    while($row = $result->fetch_assoc()) {
?>
<!-- content - start -->

    <form class="conteinerVagasCand" action="<?= htmlspecialchars('') ?>" method="get">
        <div class="vagasInfoCand">
            <p>Cargo: <?= $row['cargo_vaga'] ?></p>
            <p>Empresa: <?= $row['empresa_vaga'] ?> </p>
            <p>Local: <?= $row['local_vaga'] ?></p>
            <p>Turno: <?= $row['turno_vaga'] ?></p>
            <p>Quantidade: <?= $row['qnt_vaga'] ?></p>
        </div>

        <div>
            <input type="hidden" name="id_vaga" value="<?= $row['id_vaga'] ?>">
        </div>

<?php

    $tokenAuth = $_SESSION['tokenUser'];
    $id_vaga = $row['id_vaga'];

    $sqlVerifCand = "SELECT * FROM registrocandit_tb INNER JOIN users_tb ON registrocandit_tb.forward_key_user = users_tb.id_user INNER JOIN vagas_tb ON registrocandit_tb.forward_key_vaga = vagas_tb.id_vaga WHERE token_user = '$tokenAuth' AND id_vaga = '$id_vaga'";

    $valueCand = $conn->query($sqlVerifCand)->num_rows;

    if($valueCand == 0) {
?>
        <button class="btnCand" type="submit" name="subsVaga_btn">CANDIDATAR</button>
<?php
    } else {
?>
        <p class="msgCandTrue">Você já está candidatado!</p>
<?php        
    }
?>
    </form>

<!-- content - end -->
<?php
    }
}
?>

    </div>
</main>