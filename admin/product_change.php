<?php

if (isset($_REQUEST['item_name'])) {
    $item_name = $_REQUEST['item_name'];
    if ($item_name == '') {
        unset($item_name);
    }
}

if (isset($_REQUEST['product_id'])) {
    $product_id = $_REQUEST['product_id'];
    if ($product_id == '') {
        unset($product_id);
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
if ($_FILES['img_src']['name'] != "") {
    $img_src = $_FILES['img_src']['name'];
    copy($_FILES['img_src']['tmp_name'],"../images/".basename($_FILES['img_src']['name']));
}
if (isset($_REQUEST['wheel_diameter'])) {
    $wheel_diameter = $_REQUEST['wheel_diameter'];
    if ($wheel_diameter == '') {
        unset($wheel_diameter);
    }
}
if (isset($_REQUEST['item_type'])) {
    $item_type = $_REQUEST['item_type'];
    if ($item_type == '') {
        unset($item_type);
    }
}

if (isset($_REQUEST['sale'])) {
    $sale = $_REQUEST['sale'];
    if ($sale == '') {
        unset($sale);
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
$item_type = stripslashes($item_type);
$item_type = htmlspecialchars($item_type);
//удаляем лишние пробелы
$item_type = trim($item_type);
$item_name = trim($item_name);
$number_item = trim($number_item);
$price = trim($price);
$frame_material = trim($frame_material);
$wheel_diameter = trim($wheel_diameter);

include "../db.php";

if (isset($img_src)) {
    $sql_change = mysqli_query($link, "UPDATE items SET
    item_type = '$item_type',
    item_name = '$item_name',
    number_item = $number_item,
    price = $price, 
    frame_material = '$frame_material',
    wheel_diameter = $wheel_diameter,
    sale = $sale,
    img_src = '$img_src' WHERE id = '$product_id'");
} else {
    $sql_change = mysqli_query($link, "UPDATE items SET
    item_type = '$item_type',
    item_name = '$item_name',
    number_item = '$number_item',
    price = '$price', 
    frame_material = '$frame_material',
    wheel_diameter = '$wheel_diameter',
     sale = $sale WHERE id = '$product_id'");
}

echo "true";


