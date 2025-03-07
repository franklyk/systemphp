<?php
session_start();


if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


// unset($_SESSION['user_id']);
// unset($_SESSION['user_name']);
// unset($_SESSION['user_nickname']);
// unset($_SESSION['user_email']);
// unset($_SESSION['user_image']);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Administrativo PHP</title>
</head>

<body>
    <h1>Sistema Administrativo PHP</h1>

    <?php

    // require './Core/ConfigController.php';

    require './vendor/autoload.php';

    $home = new Core\ConfigController();
    $home->loadPage();

    ?>

</body>

</html>