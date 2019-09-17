
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/main.js"></script>
<link rel="stylesheet" type="text/css" href="css/products.css">

<div class="container bg-light marketing">
    <h1 class="m-auto pt-5 pb-5">Добро пожаловать! Рады приветствовать вас на нашем сайте!</h1>
    <h2>Популярные товары</h2>
    <?php
    include "db.php";

    $result = mysqli_query($link, "SELECT * FROM items WHERE rank > 3");
    $i = 0;

    while (($row = mysqli_fetch_array($result)) && ($i < 6)) {
        $price = $row['price'] * (1 - ($row['sale'])/100);
        echo "
        <div class='prod_elem marketing'>
            <a href='#' style='color: #5a5a5a; text-decoration: none' onclick='open_item_page(".$row['id'].")'>
                <img width='200' height='200' src='images/" . $row['img_src'] . "'>
                <h3>" . $row['item_name'] . "</h3>
            </a>
            <p><span>" . $price . " рублей</span><input id='number_item".$row['id']."' type='number' min='1' max='".$row['number_item']."' value='1'></p>
            <p><button style='min-width: 200px' type='button' class='btn btn-secondary'  onclick='add_product(" . $row['id'] . ")' role='button'>Купить &raquo;</button></p>";

            if ($row['sale'] > 0) echo "<img src='images/bookmark.png' class='sale_icon'>
                                        <span class='sale_text' style='font-size: 0.9em; color: whitesmoke'> " .$row['sale']."%</span>";
            echo "</span>
        </div>
    ";
        $i++;
    }
    ?>

</div>
<script>
    check_number_basket();
</script>