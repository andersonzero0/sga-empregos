<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/cadastro.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&family=Bebas+Neue&family=Lora:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

</head>
<body>
    <main>
        <form class="conteiner-form" action="<?= htmlspecialchars('src/controllers/loginControllers.php') ?>" method="POST">

            <div class="conteiner-legend">
                <legend class="legend-form">LOGIN</legend>
            </div>

            <div class="content-input">
                <input class="input-form" type="text" minlength="5" maxlength="15" required name="userNameClient" placeholder="Nome de usuário">
            </div>

            <div class="content-input">
                <input class="input-form" type="password" minlength="10" maxlength="15" required name="passwordClient" placeholder="Senha">
            </div>

            <div>
                <input class="btn_submit" type="submit" name="submit" value="Entrar">
                <p>Não possui uma conta? <a href="cadastro.php">Cadastre-se</a></p>
            </div>

        </form>
    </main>
</body>
</html>