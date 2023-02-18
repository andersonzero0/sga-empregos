<?php
    if ($_SERVER['PHP_SELF'] == '/sga-empregos/public/src/views/recrutador.php') {
        header('location: ../../index.html');
    } else {

        /* code php*/

?>

<main>
    <div class="conteinerCreateVaga">

        <form action="<?= htmlspecialchars('') ?>" method="get">

            <label for="cargo">Cargo:</label>
            <input type="text" name="cargo" id="cargo">
            
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