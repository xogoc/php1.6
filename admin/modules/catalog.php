<?php
if ($product['id']) {
    include "modules/catalog_edit.php";
}
else {
    include "modules/catalog_list.php";
}