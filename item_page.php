<link rel="stylesheet" type="text/css" href="css/products.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php

$item_id = $_REQUEST['id'];

include "db.php";

$result = mysqli_query($link, "SELECT * FROM items WHERE id = '$item_id'");
$row = mysqli_fetch_array($result);

$rank = $row['rank'] + 1;
$result = mysqli_query($link, "UPDATE items SET rank = '$rank' WHERE id = '$item_id'");

echo "<div class='row container pt-5 m-auto'>

        <div class='col-md-8'>
            <img class='img-fluid' src='images/".$row['img_src']."' alt='' ";
        if ($row['item_type'] == "scooter") echo "style='max-width : 550px'";
        echo " >
        </div>

        <div class='col-md-4'>
            <h3 class='my-3'>".$row['item_name']."</h3>
            <p>".$row['price']." рублей</p>
            <p>Количество на складе: ".$row['number_item']."</p>
            <h3 class='my-3'>Характеристики</h3>
            <ul>
                <li>Материал рамы: ".$row['frame_material']."</li>
                <li>Диаметр колес: ".$row['wheel_diameter']." дюймов</li>
            </ul>
            <p><button style='min-width: 200px' type='button' class='btn btn-secondary'  onclick='add_product(" . $row['id'] . ")' role='button'>Купить &raquo;</button></p>
        </div>

    </div>";
