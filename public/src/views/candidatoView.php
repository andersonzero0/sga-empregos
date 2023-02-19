<main>
    <div>

<?php   
require "src/config/connect-db.php";

$sqlCode = "SELECT * FROM vagas_tb";
$result = $conn->query($sqlCode);

if($result->num_rows == 0) {
?>

<p>Nao ha vagas</p>

<?php
} else {

    while($row = $result->fetch_assoc()) {
?>
<!-- content - start -->

    <form action="<?= htmlspecialchars('') ?>" method="get">
        <p>Cargo: <?= $row['cargo_vaga'] ?></p>
        <p>Empresa: <?= $row['empresa_vaga'] ?> </p>
        <p>Local: <?= $row['local_vaga'] ?></p>
        <p>Turno: <?= $row['turno_vaga'] ?></p>
        <p>Quantidade: <?= $row['qnt_vaga'] ?></p>

        <input type="hidden" name="id_vaga" value="<?= $row['id_vaga'] ?>">

        <button type="submit" name="subsVaga_btn">Se candidatar</button>
    </form>

<!-- content - end -->
<?php
    }
}
?>

    </div>
</main>