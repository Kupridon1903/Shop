<title>Изменение продукта</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/registration.css">

<?php


if (isset($_REQUEST['product_id'])) {
    $product_id = $_REQUEST['product_id'];
}

include "../db.php";

$result = mysqli_query($link, "SELECT * FROM items WHERE id = $product_id ");

$row = mysqli_fetch_array($result);

$item_name = $row['item_name'];
$number_item = $row['number_item'];
$price = $row['price'];
$frame_material = $row['frame_material'];
$wheel_diameter = $row['wheel_diameter'];
$item_type = $row['item_type'];
$sale = $row['sale'];



echo "<div id='form-vertical'>
    <form class='form-signin' id='form_change_product'>
        <div class='text-center mb-4'>
            <h1 class='h3 mb-3 font-weight-normal'>Изменение товара</h1>
        </div>

        <div class='form-label-group'>
            <input type='text' id='changeProductType' class='form-control' placeholder='Тип товара' name='item_type'
                   value='" .$item_type."' required>
            <label for='inputProductType'>Тип товара</label>
        </div>

        <div class='form-label-group'>
            <input type='text' id='changeName' class='form-control' autocomplete='off' placeholder='Имя товара' name='item_name'
             value='".$item_name."' required>
            <label for='inputName'>Имя товара</label>
        </div>

        <div class='form-label-group'>
            <input type='text' id='changeNumber' class='form-control' autocomplete='off' placeholder='Количество товара' name='number_item'
                   value='".$number_item."' required>
            <label for='inputNumber'>Количество товара</label>
        </div>

        <div class='form-label-group'>
            <input type='text' id='changePrice' class='form-control' autocomplete='off' placeholder='Стоимость' name='price' 
            value='".$price."' required>
            <label for='inputPrice'>Стоимость</label>
        </div>

        <div class='form-label-group'>
            <input type='text' id='changeFrameMat' class='form-control' autocomplete='off' placeholder='Материал рамы' name='frame_material'
                   value='".$frame_material."' required>
            <label for='inputFrameMat'>Материал рамы</label>
        </div>

        <div class='form-label-group'>
            <input type='text' id='changeWheelDiameter' class='form-control' autocomplete='off' placeholder='Диаметр колес' name='wheel_diameter'
                   value='".$wheel_diameter."' required>
            <label for='inputWheelDiameter'>Диаметр колес</label>
        </div>
        
        <div class='form-label-group'>
            <input type='text' id='changeSale' class='form-control' autocomplete='off' placeholder='Диаметр колес' name='sale'
                   value='".$sale."' required>
            <label for='inputWheelDiameter'>Скидка</label>
        </div>

        <div >
            <input type='file' id='changeImgSrc' placeholder='Имя изображения' name='img_src'>
            <label for='inputImgSrc'>Имя изображения</label>
        </div>
        
        <input type='hidden' id='changeProductId' name='product_id' value='".$product_id."'>
         
        <button id='change_btn' type='button' class='btn btn-lg btn-primary btn-block' onclick='change_admin_product_script()'>Изменить товар</button>
    </form>
</div>";

?>
<script>
    function check_for_eblan(){
        val1 = $('#changeNumber').val();
        val2 = $('#changePrice').val();
        val3 = $('#changeWheelDiameter').val();
        if ((val1 < 0 ) || (val2 < 0 ) || (val3 < 0 )){
            alert("Значение не может быть меньше нуля");
            return "false";
        }
        else {
            return "true";
        }
    }

    function change_admin_product_script(){
        var kek = check_for_eblan();
        if (kek != 'true') return;
        var fd = new FormData(func('#form_change_product')[0]);
        func.ajax({
            type: 'POST',
            url: 'admin/product_change.php',
            processData: false,
            contentType: false,
            data: fd,
            success: function (answer) {
                if (answer == 'true') {
                    alert("Товар успешно изменен");
                    func("#main").load("admin/admin_panel.php");
                } else {
                    alert("Произошла ошибка");
                }
            }
        });

    }
</script>
