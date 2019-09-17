<?php
session_start();

$item_id = $_REQUEST['item_id'];

if (isset($_REQUEST['number_item'])) {
    $number_item = $_REQUEST['number_item'];
}
else {
    $number_item = 1;
}

$_SESSION['item_id'][$item_id] = $item_id;
$_SESSION['number_item'][$item_id] += $number_item;

exit;
