<?php
session_start();

$item_id = $_REQUEST['item_id'];


unset($_SESSION['item_id'][$item_id]);
unset($_SESSION['number_item'][$item_id]);

exit;