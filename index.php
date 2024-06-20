<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php include './header.php';?> 
    <h2>Time4Vps</h2>
    <?php 
        if (!$user) { ?> 
        <a href='/registration.php' >Registruotis</a>
        <a href='/login.php' >Prisijungti</a>
        <?php }

        if ($user) {
            ?>
            <div><a href='/selectCategory.php'>Pateikti naują užsakymą</a></div>
            <div><a href='/ordersHistory.php'>Užsakymų istorija</a></div>
            <div><a href='/user.php'>Time4Vps inicialai</a></div>
            <?php
        }
    ?>
</body>
</html>