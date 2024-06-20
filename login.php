<?php
session_start();
require './db.php';
if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $q = $db->prepare("SELECT * FROM users WHERE email=? AND password = ? ");
    $q->bind_param('ss', $email, $password);
    $q->execute();
    $result = $q->get_result();
    $user = $result ? $result->fetch_array(MYSQLI_ASSOC) : null;
    if (!$user) {
        $error = 'Neteisingi prisijungimo duomenys';
    } else {
        $_SESSION['user'] = $user;
        header("Location: ./");
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
<?php if (isset($error)) {
    ?><div class="errorMessage">
            Klaida: <?= $error; ?>
        </div><?php
            } ?>
    <div>
        <h2>Prisijungti</h2>
        <form action="" method="POST">
            <label for="email">El. pašto adresas</label>
            <input name="email" />
            <label for="password">Slaptažodis</label>
            <input type="password" name="password" />
            <input type="submit" value="Prisijungti" />
        </form>
    </div>
</body>

</html>