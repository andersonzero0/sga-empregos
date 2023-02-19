<?php
if ($_SERVER['PHP_SELF'] == '/sga-empregos/public/src/views/recrutador.php') {
    header('location: ../../index.html');
} else {
?>

    <main>
        <div class="conteinerCreateVaga">

            <form action="<?= htmlspecialchars('src/controllers/createVagaControllers.php') ?>" method="get">

                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" id="cargo" maxlength="30" size="20">

                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa" id="empresa" maxlength="30" size="20">

                <label for="local">Local:</label>
                <input type="text" name="local" id="local" maxlength="100" size="50">

                <label for="turno">Turno:</label>
                <input type="text" name="turno" id="turno" maxlength="15" size="15">

                <label for="qnt_vaga">Quantidade de vagas:</label>
                <input type="number" name="qnt_vaga" id="qnt_vaga" maxlength="11" size="3">

                <label for="decricao_vaga"></label>
                <textarea name="descricao_vaga" id="descricao" cols="100" rows="20" maxlength="500"></textarea>

                <button name="submit" type="submit">Criar vaga</button>

            </form>

        </div>

        <div class="vagas_conteiner">
<?php
    require "src/config/connect-db.php";

    $token = $_SESSION['tokenUser'];

    $sqlVagas = "SELECT * FROM users_tb INNER JOIN vagas_tb ON users_tb.id_user = vagas_tb.forward_key_vaga WHERE token_user = '$token'";

    $result = $conn->query($sqlVagas);

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()) {

?>

        <div class="box_vaga">
            <p><?= $row['cargo_vaga'] ?></p>
        </div>

<?php
            
        }
        
    } else {
        echo "Não há vagas criadas";
    }
?>
        </div>
    </main>

<?php
}
?>