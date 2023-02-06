<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/cadastro.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/05378ddbee.js" crossorigin="anonymous"></script>

    <title>Cadastro - SGA Empregos</title>
</head>
<body>

    <main>
        <form class="conteiner-form" action="<?= htmlspecialchars('src/controllers/cadastroControllers.php') ?>" method="POST">

            <div class="conteiner-legend">
                <legend class="legend-form">CADASTRO</legend>
            </div>
        
            <div class="content-input">
                <input class="input-form" type="text" minlength="5" maxlength="15" required name="userNameClient" placeholder="Nome de usuário">
            </div>

            <div class="content-input">
                <input class="input-form" type="password" minlength="10" maxlength="15" required name="passwordClient" placeholder="Senha">
            </div>

            <div><input class="btn_submit" type="submit" value="Cadastrar"></div>
        </form>
    </main>

</body>
</html>