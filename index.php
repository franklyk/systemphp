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