<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <?php
        session_start();

        if(isset($_SESSION['tokenUser']) && isset($_SESSION['type_user'])) {

            if ($_SESSION['type_user'] == "recrutador") {

                include "src/views/recrutadorView.php";
                
            } elseif ($_SESSION['type_user'] == "candidato") {

                include "src/views/candidatoView.php";
                
            }
            
        } else {

            echo 0101;
            
        }
    ?>

</body>
</html>