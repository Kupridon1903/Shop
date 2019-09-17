
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>


<button class="btn btn-secondary ml-5" onclick="add_admin_product()">Добавить товар</button>
    <div class='container-fluid bg-light mt-2' style="color: #000; font-weight: bold">
        <div class='row'>
            <div class='col' id='img_col'>
                <span>Изображение</span>
            </div>
            <div class='col'>
                <span>Наименование</span>
            </div>
            <div class='col pr-4'>
                <span>Цена</span>
            </div>
            <div class='col-md-auto pr-4'>
                <span>Изменение</span>
            </div>
            <div class='col-md-auto pr-4'>
                <span>Удаление</span>
            </div>
        </div>
    </div>
<?php

include "../db.php";

$result = mysqli_query($link, "SELECT * FROM items");

while ($row = mysqli_fetch_array($result)) {
    echo "
                    <div class='container-fluid bg-light mt-2'>
                        <div class='row'>
                            <div class='col' id='img_col'>
                                <img class='img_src' src='images/" . $row['img_src'] . "'>
                            </div>
                            <div class='col'>
                                <span>" . $row['item_name'] . "</span>
                            </div>
                            <div class='col'>
                                <span>" . $row['price'] . "</span>
                            </div>
                            <div class='col-md-auto'>
                                <button type='button' class='btn btn-secondary' 
                                onclick='change_admin_product(" . $row['id'] . ")'>Изменить</button>
                            </div>
                            <div class='col-md-auto'>
                                <button type='button' class='btn btn-danger' onclick='delete_admin_product(" . $row['id'] . ")'>Удалить</button>
                            </div>
                        </div>
                    </div>";
}
?>