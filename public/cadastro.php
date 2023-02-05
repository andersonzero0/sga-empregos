<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <main>
        <form action="<?= htmlspecialchars('src/controllers/cadastroControllers.php') ?>" method="POST">
            <label for="">Usuário</label>
            <input type="text" minlength="5" maxlength="15" required name="userNameClient">
            <label for="">Senha</label>
            <input type="password" minlength="10" maxlength="15" required name="passwordClient">
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>