<?php

$login = $_POST['login'];

include("db.php");

$result = mysqli_query($link, "SELECT id FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);

if (!empty($myrow['id'])) echo "true";
