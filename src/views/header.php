<?php
    if ($_SERVER['PHP_SELF'] == '/sga-empregos/public/src/views/header.php') {
        header('location: ../../index.html');
    } else {

        if (isset($_GET['sair'])) {

            session_start();

            session_destroy();

            header('location: home.php');
            
        }

?>

<header class="header">

    <div class="logo_conteiner">
        <p class="logo_text">SGA EMPREGOS</p>
    </div>

    <nav class="navbar_conteiner">

        <ul class="navbar">
            <li class="type_text"><?= $datasUser['type_user'] ?></li>
            
            <li class="nameUser"><?= $datasUser['user_name'] ?></li>

            <li class="conteiner_imgPerfil"><img class="img_perfil" src="assets/images/<?= $datasUser['link_image_profile_userData'] ?>" alt=""></li>

            <li>
                <form action="<?= htmlspecialchars('') ?>" method="get">
                    <button class="btn_exit" type="sair" name="sair">Sair</button>
                </form>
            </li>
        </ul>
        
    </nav>

</header>

<?php
    }
?>