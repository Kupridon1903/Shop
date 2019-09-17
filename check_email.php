<?php

$email = $_POST['email'];

include("db.php");

$result = mysqli_query($link, "SELECT id FROM users WHERE mail='$email'");
$myrow = mysqli_fetch_array($result);

if (!empty($myrow['id'])) echo "true";
