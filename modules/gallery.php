<?php
if($_GET['img']) {
?>
    <a href="/php1.6/?mod=gallery">Вернуться в галерею</a>
    <figure class="img">
        <p><img src="<?=$img['path'].$img['name']?>" alt="" /></p>
        <figcaption>
            <?="Name: ".$img['name']."<br>Views: ".$img['views']?>
        </figcaption>
    </figure>
<?php
}
else {
?>
<div>
<?php
$result = mysqli_query($conn, "SELECT * FROM gallery_images ORDER BY views DESC");
while ($img = mysqli_fetch_assoc($result)) {
    echo "<div class='thumbnail'><a href='?mod=gallery&img=".$img['id']."' title='".$img['name']."'><img src='".GALLERY_IMAGES_PATH."thumbnail/tn_".$img['name']."' alt='".$img['name']."'></a><p>Views: ".$img['views']."</p></div>\n";
}
?>
</div>
<div><?=$message?></div>
<form enctype="multipart/form-data" action="" method="POST">
    <div>
        <label for="file">Choose image to upload</label>
        <input name="img" id="file" type="file">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
<?php
}
?>