<?php

$id = $_REQUEST['id'];

include "../db.php";

$sql_delete = mysqli_query($link,"DELETE FROM items WHERE id = $id");

echo "true";

exit();