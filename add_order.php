<?php
session_start();

$delivery = 1;
$email = $_REQUEST['email'];
$fname = $_REQUEST['fname'];
$fam = $_REQUEST['fam'];
$address = $_REQUEST['address'];
if (isset($_REQUEST['delivery'])) {
    $delivery = 0;
}



include "db.php";

if (isset($_SESSION['item_id'])) {
    $item_id = $_SESSION['item_id'];
    $number_item = $_SESSION['number_item'];

    $result = mysqli_query($link, "INSERT INTO orders
 VALUES (NULL, '$address', '$fname', '$fam', '$email', '$delivery')");

    if ($result == 1) {
        foreach ($item_id as $key => $value) {
            $result = mysqli_query($link, "INSERT INTO order_positions
 VALUES (NULL, (SELECT max(id) FROM orders), '" . $value . "', '" . $number_item["$value"] . "')");
        }
        echo "true";
    }
}
