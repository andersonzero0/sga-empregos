<?php
if ($_SERVER['PHP_SELF'] == '/sga-empregos/public/src/views/recrutador.php') {
    header('location: ../../index.html');
} else {
    if (isset($_GET['submit'])) {
        require "src/config/connect-db.php";
        require "src/functions/functions.php";

        $cargo = $_GET['cargo'];
        $empresa = $_GET['empresa'];
        $local = $_GET['local'];
        $turno = $_GET['turno'];
        $qnt_vaga = $_GET['qnt_vaga'];
        $descricao_vaga = $_GET['descricao_vaga'];
        $id = tokenForID($_SESSION['tokenUser']);

        $sqlInsertVaga = "INSERT INTO vagas_tb(forward_key_vaga, cargo_vaga, empresa_vaga, local_vaga, turno_vaga, qnt_vaga, descricao_vaga) VALUES($id, $cargo, $empresa, $local, $turno, $qnt_vaga, $descricao_vaga)";

        $conn->query($sqlInsertVaga);
    }

?>

    <main>
        <div class="conteinerCreateVaga">

            <form action="<?= htmlspecialchars('') ?>" method="get">

                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" id="cargo" maxlength="">

                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa" id="empresa">

                <label for="local">Local:</label>
                <input type="text" name="local" id="local">

                <label for="turno">Turno:</label>
                <input type="text" name="turno" id="turno">

                <label for="qnt_vaga">Quantidade de vagas:</label>
                <input type="text" name="qnt_vaga" id="qnt_vaga">

                <label for="decricao_vaga"></label>
                <textarea name="descricao_vaga" id="descricao" cols="100" rows="20"></textarea>

                <button name="submit" type="submit">Criar vaga</button>

            </form>

        </div>
    </main>

<?php
}
?>