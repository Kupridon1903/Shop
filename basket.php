<?php session_start(); ?>

<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/products.css">
<script src="js/main.js"></script>

<div class="container-fluid bg-light basket_main">
    <div class="container bg-light marketing">
        <h2>Корзина</h2>
        <?php 
        if ((isset($_SESSION['item_id'])) && (!empty($_SESSION['item_id']))){
            echo "
                <div class='container-fluid bg-light' id='basket_buttons'>
                    <button class='btn btn-secondary ml-5' id='add_order'>Оформить заказ</button>
                    <a href='#' onclick='basket_clear()'>
                        <button class='btn btn-danger ml-5' id='clear_basket_button'>Очистить корзину</button>
                    </a>
                </div>";
        }
        include "db.php";
        if (isset($_SESSION['item_id'])) {
            $item_id = $_SESSION['item_id'];
            $number_item = $_SESSION['number_item'];

            foreach ($item_id as $key => $value) {
                $result = mysqli_query($link, "SELECT * FROM items WHERE id = $value");
                $row = mysqli_fetch_array($result);
                echo "
                    <div class='prod_elem marketing'>
                        <img width='200' height='200' src='images/" . $row['img_src'] . "'>
                        <h3>" . $row['item_name'] . "</h3>
                        <p><span>" . $row['price'] . " рублей</span> Кол-во: ".$number_item["$value"]."</p>
                        <p><button style='min-width: 200px' type='button' class='btn btn-secondary' onclick='delete_product(" . $row['id'] . ")' role='button'>Удалить &raquo;</button></p>
                    </div>";
            }
        }
        ?>

    </div>
</div>

