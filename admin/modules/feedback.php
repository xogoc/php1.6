<?php
if ($feedback['id']) {
    include "modules/feedback_edit.php";
}
else {
    include "modules/feedback_list.php";
}