<?php
session_start();


if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}




// require './Core/ConfigController.php';

require './vendor/autoload.php';

$home = new Core\ConfigController();
$home->loadPage();
