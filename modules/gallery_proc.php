<?php
$title = "Галерея";

if($_GET['img']) {
    $id = intval($_GET['img']);
    mysqli_query($conn, "UPDATE gallery_images SET views=views+1 WHERE id=$id LIMIT 1");
    $result = mysqli_query($conn, "SELECT * FROM gallery_images WHERE id=$id LIMIT 1");
    $img = mysqli_fetch_assoc($result);
    $title .= " - ".$img['name'];
}

if($_FILES['img']) {
    if (!preg_match("/^image\/.+$/", $_FILES['img']['type'])) {
        $message = "Error: wrong file type!";
    } elseif ($_FILES['img']['error']) {
        $message = "Error " . $_FILES['img']['error'];
    } else {
        $name = friendlyName($_FILES['img']['name']);
        $size = $_FILES['img']['size'];
        if (move_uploaded_file($_FILES['img']['tmp_name'], GALLERY_IMAGES_PATH.$name)) {
            $message = "Image uploaded successfully!";
            mysqli_query($conn, "INSERT INTO gallery_images (name, path, size) VALUES ('$name', '".GALLERY_IMAGES_PATH."', $size)");
            create_thumbnail(GALLERY_IMAGES_PATH.$name, GALLERY_IMAGES_PATH."thumbnail/tn_".$name, 160, 120);
        } else {
            $message = "Error while uploading image!";
        }
    }
}