<?php

session_start();

if (isset($_SESSION['item_id']))
echo "true";

exit;
