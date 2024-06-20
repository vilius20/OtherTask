<?php 
$user = $_SESSION['user'];
if ($user) {
?>
    <div class="header">
        <div>
            <a href="/" class="button">Pradžia</a>
        </div>
        <div class="avatar">
            <div><a href="/user.php"><?= $user['email']; ?></a> </div>
            <div><a href='/logout.php' class="button">Atsijungti</a></div>
        </div>
    </div>
<?php }
