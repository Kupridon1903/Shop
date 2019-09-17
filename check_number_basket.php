<?php

session_start();

if (isset($_SESSION['item_id']))
    $check = $_SESSION['item_id'];

echo count($check);

exit;
