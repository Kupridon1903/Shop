<?php session_start(); ?>

<link rel="stylesheet" type="text/css" href="css/products.css">


<div class="container-fluid bg-light">
    <div class="container marketing">
        <h2>Велосипеды</h2>
        <?php
        include "db.php";

        $result = mysqli_query($link, "SELECT * FROM items WHERE item_type = 'bike' ");

        while ($row = mysqli_fetch_array($result)) {
            echo "
        <div class='prod_elem marketing'>
            <a href='#' style='color: #5a5a5a; text-decoration: none' onclick='open_item_page(".$row['id'].")'>
                <img width='200' height='140' src='images/" . $row['img_src'] . "'>
                <h3>" . $row['item_name'] . "</h3>
            </a>
            <p><span>" . $row['price'] . " рублей</span><input id='number_item".$row['id']."' type='number' min='1' max='".$row['number_item']."' value='1'></p>
            <p><button style='min-width: 200px' type='button' class='btn btn-secondary'  onclick='add_product(" . $row['id'] . ")' role='button'>Купить &raquo;</button></p>
        </div>";
        }
        ?>

    </div>
</div>
