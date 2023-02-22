<?php
if ($_SERVER['PHP_SELF'] == '/sga-empregos/public/src/views/recrutadorView.php') {
    header('location: ../../index.html');
} else {
?>

    <main>
        <button class="btnOpenCreateVaga"><i class="fa-solid fa-circle-plus iconOpenVaga"></i>CRIAR VAGA</button>

        <div class="conteinerCreateVaga" style="display: none;">

            <button class="closeCreateVaga"><i class="fa-solid fa-xmark"></i></button>

            <form class="formConteinerRecrutador" action="<?= htmlspecialchars('src/controllers/createVagaControllers.php') ?>" method="get">

                <div class="boxInfoRecrut">
                    <div>
                        <label for="cargo">Cargo:</label>
                        <input type="text" name="cargo" id="cargo" maxlength="30" size="20">
                    </div>
                    <div>
                        <label for="empresa">Empresa:</label>
                        <input type="text" name="empresa" id="empresa" maxlength="30" size="20">
                    </div>
                    <div>
                        <label for="local">Local:</label>
                        <input type="text" name="local" id="local" maxlength="100" size="50">
                    </div>
                    <div>
                        <label for="turno">Turno:</label>
                        <input type="text" name="turno" id="turno" maxlength="15" size="15">
                    </div>
                    <div>
                        <label for="qnt_vaga">Quantidade de vagas:</label>
                        <input class="inputQtnVagas" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;"  type="number" name="qnt_vaga" id="qnt_vaga" maxlength="11" size="4">
                    </div>
                </div>

                <div class="conteinerTexta">
                    <textarea class="textareaDesc" placeholder="Descrição" name="descricao_vaga" id="descricao" cols="100" rows="6" maxlength="499"></textarea>
                </div>

                <div><button name="submit" class="btnCreateVaga" type="submit">Criar vaga</button></div>

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

    <script src="assets/js/scriptRecrutador.js"></script>

<?php
}
?>