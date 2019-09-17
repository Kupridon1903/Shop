<?php

if (isset($_REQUEST['item_name'])) {
    $item_name = $_REQUEST['item_name'];
    if ($item_name == '') {
        unset($item_name);
    }
}

if (isset($_REQUEST['item_type'])) {
    $item_type = $_REQUEST['item_type'];
    if ($item_type == '') {
        unset($item_type);
    }
}

if (isset($_REQUEST['number_item'])) {
    $number_item = $_REQUEST['number_item'];
    if ($number_item == '') {
        unset($number_item);
    }
}
if (isset($_REQUEST['price'])) {
    $price = $_REQUEST['price'];
    if ($price == '') {
        unset($price);
    }
}
if (isset($_REQUEST['frame_material'])) {
    $frame_material = $_REQUEST['frame_material'];
    if ($frame_material == '') {
        unset($frame_material);
    }
}
if (isset($_REQUEST['wheel_diameter'])) {
    $wheel_diameter = $_REQUEST['wheel_diameter'];
    if ($wheel_diameter == '') {
        unset($wheel_diameter);
    }
}
if (isset($_FILES['img_src'])) {
    $img_src = $_FILES['img_src']['name'];
    copy($_FILES['img_src']['tmp_name'],"../images/".basename($_FILES['img_src']['name']));
}
if (isset($_REQUEST['wheel_diameter'])) {
    $wheel_diameter = $_REQUEST['wheel_diameter'];
    if ($wheel_diameter == '') {
        unset($wheel_diameter);
    }
}

$item_name = stripslashes($item_name);
$item_name = htmlspecialchars($item_name);
$number_item = stripslashes($number_item);
$number_item = htmlspecialchars($number_item);
$price = stripslashes($price);
$price = htmlspecialchars($price);
$frame_material = stripslashes($frame_material);
$frame_material = htmlspecialchars($frame_material);
$wheel_diameter = stripslashes($wheel_diameter);
$wheel_diameter = htmlspecialchars($wheel_diameter);
$item_name = trim($item_name);
$number_item = trim($number_item);
$price = trim($price);
$frame_material = trim($frame_material);
$wheel_diameter = trim($wheel_diameter);

include "../db.php";


$sql_add = mysqli_query($link,"INSERT INTO items
 VALUES (NULL, '$item_name', '$number_item', '$price', '$frame_material', '$wheel_diameter', '1', '$img_src', '$item_type')");

echo "true";
