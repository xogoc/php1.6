<?php
require "../config.php";
$mod = $_GET['mod'] ? (string)htmlspecialchars(strip_tags($_GET['mod'])) : DEFAULT_ADMIN;

if (file_exists("modules/" . $mod . "_proc.php")) {
    $process = "modules/" . $mod . "_proc.php";
}
if (file_exists("modules/" . $mod . ".php")) {
    $content = "modules/" . $mod . ".php";
}
else {
    header("Location: /php1.6/admin/");
}

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
mysqli_set_charset($conn, "utf8");
require "../modules/functions.php";

if ($process) include $process;
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>php1.6 - admin<?= $title ? " - ".$title : "" ?></title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <ul>
        <li><a href="?mod=gallery">Галерея</a></li>
        <li><a href="?mod=feedback">Отзывы</a></li>
        <li><a href="?mod=catalog">Каталог</a></li>
    </ul>
    <h1><?=$title;?></h1>
    <?php
    require $content;
    ?>
    </body>
    </html>
<?php
//mysqli_close($conn);
?>