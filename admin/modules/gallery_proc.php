<?php
$title = "Галерея";

if ($_GET['act'] == 'delete') {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT name, path FROM gallery_images WHERE id=$id");
    $img = mysqli_fetch_assoc($result);
    unlink("../".$img['path'].$img['name']);
    unlink("../".$img['path']."thumbnail/tn_".$img['name']);
    mysqli_query($conn, "DELETE FROM gallery_images WHERE id=$id LIMIT 1");
    header("Location: /php1.6/admin/?mod=gallery");
}
