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

    if(isset($_GET['btn_deleteVaga'])) {
        $id_vagaDelete = $_GET['id_vagaDelete'];

        $sqlDeleteVaga = "DELETE FROM vagas_tb WHERE id_vaga=$id_vagaDelete";
        $conn->query($sqlDeleteVaga);
        header("location: home.php");
    }

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()) {

?>

        <div class="box_vaga">

            <form action="<?= htmlspecialchars('') ?>" method="get">
                <input type="hidden" name="id_vagaDelete" value="<?= $row['id_vaga'] ?>">
                <button name="btn_deleteVaga" class="btn-deleteVaga"><i class="fa-solid fa-trash"></i></button>
            </form>

            <div class="conteinerViewListInfo">
                <p>Cargo: <?= $row['cargo_vaga'] ?></p>
                <p>Empresa: <?= $row['empresa_vaga'] ?></p>
                <p>Quantidade de vagas: <?= $row['qnt_vaga'] ?></p>
            </div>

            <div class="conteinerViewList">
                <button class="btnViewList" type="button">Vizualizar Candidatos</button>

                <div class="contentListViewGeral" style="display: none;">

                <div class="conteinerCandidatosAprovados">
                    <label for="candidatosAceitos"><strong>Candidatos aceitos:</strong></label>

                <?php
                    $id_vagaView001 = $row['id_vaga'];
                    $sql001 = "SELECT * FROM registrocandit_tb INNER JOIN users_tb ON registrocandit_tb.forward_key_user = users_tb.id_user INNER JOIN vagas_tb ON registrocandit_tb.forward_key_vaga = vagas_tb.id_vaga INNER JOIN user_datas_tb ON users_tb.id_user = user_datas_tb.forward_key_userData WHERE registrocandit_tb.forward_key_vaga = $id_vagaView001 AND registrocandit_tb.stage_vaga = 'ACEITO'";

                    $result001 = $conn->query($sql001);

                    if($result001->num_rows == 0) {
                        echo "Não há candidatos";
                    } else {
                        while($row001 = $result001->fetch_assoc()) {
                        ?>
                            <div>
                                <p style="font-weight: bolder;"><?= $row001['full_name_userData'] ?></p>
                            </div>
                        <?php
                        }
                    }
                ?>

                </div>

                    <?php

                    $id_vagaView = $row['id_vaga'];

                    $sqlViewCand = "SELECT * FROM registrocandit_tb INNER JOIN users_tb ON registrocandit_tb.forward_key_user = users_tb.id_user INNER JOIN vagas_tb ON registrocandit_tb.forward_key_vaga = vagas_tb.id_vaga INNER JOIN user_datas_tb ON users_tb.id_user = user_datas_tb.forward_key_userData WHERE registrocandit_tb.forward_key_vaga = $id_vagaView AND registrocandit_tb.stage_vaga = 'PENDENTE'";

                    $resultViewCand = $conn->query($sqlViewCand);

                    if($resultViewCand->num_rows == 0) {

                        echo "Não há candidatos";

                    } else {

                        if (isset($_GET['optAcceptCand'])) {
                            $idCandForVaga = $_GET['idCandForVaga'];
                            $idVagaForCand = $_GET['idVagaForCand'];
                            $sqlAcceptCand = "UPDATE registrocandit_tb SET stage_vaga = 'ACEITO' WHERE forward_key_user = $idCandForVaga AND forward_key_vaga = $idVagaForCand";
                            $conn->query($sqlAcceptCand);
                            header('location: home.php');
                        }

                        if (isset($_GET['optRejectCand'])) {
                            $idCandForVagaR = $_GET['idCandForVaga'];
                            $idVagaForCand = $_GET['idVagaForCand'];
                            $sqlRejectCand = "UPDATE registrocandit_tb SET stage_vaga = 'REJEITADO' WHERE forward_key_user = $idCandForVagaR AND forward_key_vaga = $idVagaForCand";
                            $conn->query($sqlRejectCand);
                            header('location: home.php');
                        }
                    
                        while($rowViewCand = $resultViewCand->fetch_assoc()) {
                        ?>

                        <div class="boxUserList">
                            <div class="viewUserListInicial">
                                <button class="openMaxInfo" style="border: none; background: transparent;"><i class="fa-regular fa-square-caret-down"></i></button>

                                <img class="imgUserList" src="assets/images/<?= $rowViewCand['link_image_profile_userData'] ?>" alt="">
                                <p>Nome: <?= $rowViewCand['full_name_userData'] ?></p>
                                <a href="assets/pdf/<?= htmlspecialchars($rowViewCand['link_curriculum_vitae_userData']) ?>" target="_blank">Curriculo <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>

                            <div style="display: none;" class="viewInfoExtraAndOptions">
                                <div class="boxInfoExtra">
                                    <p>Email: <?= $rowViewCand['email_address_userData'] ?></p>
                                    <p>Telefone: <?= $rowViewCand['phone_number_userData'] ?></p>
                                    <p>Link Externo: <a href="<?= $rowViewCand['external_link_userData'] ?>" target="_blank"><?= $rowViewCand['external_link_userData'] ?></a></p>
                                </div>

                                <div>
                                    <form class="formOptExtra" action="<?= htmlspecialchars('') ?>" method="get">
                                        <input type="hidden" size="2" name="idCandForVaga" value="<?= $rowViewCand['id_user'] ?>">
                                        <input type="hidden" size="2" name="idVagaForCand" value="<?= $row['id_vaga'] ?>">
                                        <button name="optAcceptCand" class="optAcceptCand" type="submit" disabled>ACEITAR</button>
                                        <button name="optRejectCand" class="optRejectCand" type="submit" disabled>RECUSAR</button>
                                    </form>

                                    <input type="checkbox" name="verifActionVaga" class="verifActionVaga">
                                    <label for="verifActionVaga">Tenho certeza da minha escolha.</label>
                                </div>
                            </div>
                        </div>  

                        <?php
                        }
            
                    }
                        
                    ?>
                    
                </div>
            </div>
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

    <script>

        const verifActionVaga = document.getElementsByClassName("verifActionVaga");
        const optAcceptCand = document.getElementsByClassName("optAcceptCand");
        const optRejectCand = document.getElementsByClassName("optRejectCand");

        for (var i = 0; i < verifActionVaga.length; i++) {
            (function(index) {
                verifActionVaga[index].addEventListener('change', function() {
                    if(verifActionVaga[index].checked) {
                        optAcceptCand[index].removeAttribute('disabled');
                        optRejectCand[index].removeAttribute('disabled');
                    } else {
                        optAcceptCand[index].setAttribute('disabled', 'disabled');
                        optRejectCand[index].setAttribute('disabled', 'disabled');
                    }
                });
            })(i);
        }

    </script>

<?php
}
?>