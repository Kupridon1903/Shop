<?php

$password = $_POST['password'];
$user_id = $_POST['user_id'];

if($password == ""){
    echo ("1");
    exit;
}

include("db.php");

$result = mysqli_query($link, "SELECT password FROM users WHERE id='$user_id'");
$row = mysqli_fetch_array($result);

if (!password_verify($password, $row['password'])) {
    echo "0";
}
