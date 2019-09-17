<?php

if (isset($_REQUEST['fname'])) {
    $fname = $_REQUEST['fname'];
    if ($fname == '') {
        unset($fname);
    }
}

if (isset($_REQUEST['fam'])) {
    $fam = $_REQUEST['fam'];
    if ($fam == '') {
        unset($fam);
    }
}

if (isset($_REQUEST['newpass'])) {
    $newpass = $_REQUEST['newpass'];
    if ($newpass == '') {
        unset($newpass);
    }
}

$oldpass = "";
if (isset($_REQUEST['oldpass'])) {
    $oldpass = $_REQUEST['oldpass'];
}

$user_id = $_REQUEST['user_id'];

$fam = stripslashes($fam);
$fam = htmlspecialchars($fam);
$fname = stripslashes($fname);
$fname = htmlspecialchars($fname);
$fname = trim($fname);
$fam = trim($fam);


include "db.php";

if ($oldpass != ""){
    $newpass = password_hash($newpass, PASSWORD_DEFAULT);

    $sql_change = mysqli_query($link,
        "UPDATE users SET fname = '$fname',
    fam = '$fam', password = '$newpass'
    WHERE id = $user_id");
    echo "$fname";
} else {
    $sql_change = mysqli_query($link,
        "UPDATE users SET fname = '$fname',
    fam = '$fam'
    WHERE id = $user_id");
    echo "$fname";
}


