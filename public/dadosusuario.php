<?php
session_start();

if(isset($_SESSION['tokenUser'])) {
    require "src/functions/functions.php";

    $tokenUser = $_SESSION['tokenUser'];

    if(!dadosUserExists($tokenUser)) {
?>

<!--  -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="<?= htmlspecialchars('src/controllers/dadosUserControllers.php') ?>" method="post" enctype="multipart/form-data">
            <label for="fullName">Nome Completo:</label>
            <input type="text" name="fullName" id="fullName" required minlength="15" maxlength="80" size="35">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required minlength="3" maxlength="50" size="30">

            <label for="phone">Telefone:</label>
            <input type="tel" name="phone" id="phone" required minlength="10" maxlength="20" size="20">

            <label for="type_user">Você é</label>
            <select name="type_user" id="type_user" required>
                <option value="" disabled selected>Selecione</option>
                <option value="RECRUTADOR">Recrutador</option>
                <option value="CANDIDATO">Candidato</option>
            </select>

            <label for="link">Rede Social:</label>
            <input type="url" name="link" id="link" required minlength="5" maxlength="60" size="30">

            <label for="curriculoPDF">Currículo</label>
            <input type="file" name="curriculoPDF" id="curriculoPDF" accept=".pdf" required>

            <button type="submit" name="submit">Enviar</button>
        </form>
    </main>
</body>
</html>

<?php
    } else {
        echo 1;
    }
} else {
    echo 2;
}
?>