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
        <form action="" method="post">
            <label for="fullName">Nome Completo</label>
            <input type="text" name="fullName" id="fullName">
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