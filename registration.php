<?php
require './db.php';
if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $q = $db->prepare("INSERT INTO users (email, password) VALUES (?,?) ");
    $q->bind_param('ss', $email, $password);
    if ($q->execute()) {
        header("Location: ./login.php");
    }
}
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
    <div>
        <h2>Registracija</h2>
        <form action="" method="POST">
            <label for="email">El. pašto adresas</label>
            <input name="email" />
            <label for="password">Slaptažodis</label>
            <input type="password" name="password" />
            <input type="submit" value="Registruotis" />
        </form>
    </div>
</body>

</html>