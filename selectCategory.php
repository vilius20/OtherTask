<?php
try {
    require './session.php';
    require './api/order.php';
    $time4VpsUser = $_SESSION['time4VpsUser'];
    $error;
    $categories = Category::getAll($time4VpsUser)->categories;
} catch (Exception $e) {
    $categories = [];
    $error = $e->getMessage();
}

if (isset($_REQUEST['category'])) {
    $reqCategory = $_REQUEST['category'];
    $category = array_values(array_filter($categories, fn ($x) => $x->id === $reqCategory));
    if (count($category) && ($name = $category[0]->name)) header("Location: ./placeOrder.php?categoryId=$reqCategory&categoryName=$name");
    else $error = '';
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
    <?php include './header.php'; ?>
    <?php if (isset($error)) {
    ?><div class="errorMessage">
            Klaida: <?= $error; ?>
        </div><?php
            } ?>
    <div>
        <h2>Pateikti užsakymą</h2>
        <div>Pasirinkite kategoriją</div>
        <form method="POST" action="">
            <?php
            array_map(function ($x) {
            ?>
                <div>
                    <input type="radio" id="<?= $x->id; ?>" name="category" value="<?= $x->id; ?>">
                    <label for="<?= $x->id; ?>"><?= $x->name; ?></label><br>
                </div>
            <?php
            }, $categories);
            ?>
            <input type="submit" value="Tęsti" />
        </form>
    </div>
</body>

</html>