<?php
$title = "Отзывы";

if ($_POST['add']) {
    $name = substr((string)htmlspecialchars(strip_tags($_POST['nickname'])), 0, 64);
    $body = (string)htmlspecialchars(strip_tags($_POST['feedback']));
    $values = "feedback='$body'" . ($name ? ", nickname='$name'" : "");
    mysqli_query($conn, "INSERT INTO feedback SET $values");
}