<?php

session_start();

$user = $_SESSION['user'];
if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $_SESSION['time4VpsUser'] = [
        'user' => $_REQUEST['username'],
        'pass' => $_REQUEST['password']
    ];
}
$time4VpsUser = isset($_SESSION['time4VpsUser']) ? $_SESSION['time4VpsUser'] : null;

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
    <h2>Vartotojo informacija</h2>
    <div>
        <label>Vartotojo vardas: </label>
        <span><?= $user['email']; ?></span>
    </div>
    <hr/>
    <div>
        <label for="time4vpsCredentials">Time4Vps prisijungimai:</label>
        <form action="" method="POST" name="time4vpsCredentials">
            <input name="username" value="<?= $time4VpsUser['user'] ?? null; ?>" />
            <label for="username">Prisijungimo vardas</label>
            <input name="password" type="password" value="<?= $time4VpsUser['pass'] ?? null; ?>"/>
            <label for="password">Prisijungimo slaptažodis</label>
            <input type="submit" value="Išsaugoti" />
        </form>
    </div>
</body>

</html>