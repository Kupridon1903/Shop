
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<div class='container-fluid bg-light mt-2' style="color: #000; font-weight: bold">
    <div class='row'>
        <div class='col' id='img_col'>
            <span>Наименование</span>
        </div>
        <div class='col'>
            <span>Количество</span>
        </div>
        <div class='col pr-3'>
            <span>Адрес</span>
        </div>
        <div class='col-md-auto pr-4'>
            <span>Удаление</span>
        </div>
    </div>
</div>

<?php

include "../db.php";

$result = mysqli_query($link, "SELECT * FROM orders");


while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($link, "SELECT item_name FROM items WHERE id = '".$row['item_id']."'");
    $res_row = mysqli_fetch_array($res);
    echo "
                    <div class='container-fluid bg-light mt-2'>
                        <div class='row'>
                            <div class='col'>
                                <span>" . $res_row['item_name'] . "</span>
                            </div>
                            <div class='col'>
                                <span>" . $row['number_item'] . "</span>
                            </div>
                            <div class='col'>
                                <span>" . $row['address'] . "</span>
                            </div>
                            <div class='col-md-auto'>
                                <button type='button' class='btn btn-danger' onclick='delete_admin_order(" . $row['id'] . ")'>Удалить</button>
                            </div>
                        </div>
                    </div>";
}
?>