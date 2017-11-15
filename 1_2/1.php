<?php
if ($_POST['do']) {
    require "func.php";
    $result = implode(" ", array($_POST['a'], $_POST['do'], $_POST['b']))." = ".mathOperation($_POST['a'], $_POST['b'], $_POST['do']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>php1.6.1</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="a"><br>
        <select name="do">
            <option value="+">сложение</option>
            <option value="-">вычитание</option>
            <option value="*">умножение</option>
            <option value="/">деление</option>
        </select><br>
        <input type="text" name="b"><br>
        <input type="submit" value="Посчитать">
    </form>
    <p><?= $result ? $result : ""; ?></p>
</body>
</html>