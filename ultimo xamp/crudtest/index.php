<?php
    require_once "./config/app.php";
    require_once "./autoloader.php";
    require_once "./app/views/inc/session_start.php";

    if(isset($_GET['views'])){
        $url = explode('/',$_GET['views']);

    }else{
        $url = ['login'];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php  require_once "./app/views/inc/head.php" ?>
</head>
<body>
    <?php require_once "./app/views/inc/body.php" ?>
</body>
</html>