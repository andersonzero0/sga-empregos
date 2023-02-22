<main class="mainCandidato">

    <!-- Conteiner Vagas Cadastradas - Start -->

    <div>
        
    </div>

    <!-- Conteiner Vagas Cadastradas - End -->

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

        $tokenAuth = $_SESSION['tokenUser'];
        $id_vaga = $row['id_vaga'];

        $sqlVerifCand = "SELECT * FROM registrocandit_tb INNER JOIN users_tb ON registrocandit_tb.forward_key_user = users_tb.id_user INNER JOIN vagas_tb ON registrocandit_tb.forward_key_vaga = vagas_tb.id_vaga WHERE token_user = '$tokenAuth' AND id_vaga = '$id_vaga'";

        $valueCand = $conn->query($sqlVerifCand)->num_rows;

        if($valueCand == 0) {
?>
<!-- content - start -->

    <form class="conteinerVagasCand" action="<?= htmlspecialchars('') ?>" method="get">
        <div class="vagasInfoCand">
            <p><strong>Cargo:</strong> <?= $row['cargo_vaga'] ?></p>
            <p><strong>Empresa:</strong> <?= $row['empresa_vaga'] ?> </p>
            <p><strong>Local:</strong> <?= $row['local_vaga'] ?></p>
            <p><strong>Turno:</strong> <?= $row['turno_vaga'] ?></p>
            <p><strong>Quantidade de vagas:</strong> <?= $row['qnt_vaga'] ?></p>

            <p class="descricaoContent" style="display: none;"><strong>Descrição:</strong> <?= $row['descricao_vaga'] ?></p>

            <button class="btn_desc" type="button"><i class="fa-solid fa-sort-down iconBtnDesc"></i>Descrição</button>
        </div>

        <div>
            <input type="hidden" name="id_vaga" value="<?= $row['id_vaga'] ?>">
        </div>
        <button class="btnCand" type="submit" name="subsVaga_btn">CANDIDATAR</button>
    </form>

<!-- content - end -->
<?php
        }
    }
}
?>

    </div>
</main>

<script src="assets/js/scriptCandidato.js"></script>