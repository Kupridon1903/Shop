<title>Создание продукта</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/registration.css">

<div id="form-vertical">
    <form class="form-signin" id="form_add_product">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Создание товара</h1>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputProductType" class="form-control" placeholder="Тип товара" name="item_type"
                   required>
            <label for="inputProductType">Тип товара</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputName" class="form-control" placeholder="Имя товара" name="item_name" required>
            <label for="inputName">Имя товара</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputNumber" class="form-control" placeholder="Количество товара" name="number_item"
                   required>
            <label for="inputNumber">Количество товара</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputPrice" class="form-control" placeholder="Стоимость" name="price" required>
            <label for="inputPrice">Стоимость</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputFrameMat" class="form-control" placeholder="Материал рамы" name="frame_material"
                   required>
            <label for="inputFrameMat">Материал рамы</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputWheelDiameter" class="form-control" placeholder="Диаметр колес" name="wheel_diameter"
                   required>
            <label for="inputWheelDiameter">Диаметр колес</label>
        </div>

        <div >
            <input type="file" id="inputImgSrc" class="form-control-file" placeholder="Имя изображения" name="img_src"
                   required>
            <label for="inputImgSrc">Имя изображения</label>
        </div>

        <button type="button" class="btn btn-lg btn-primary btn-block" onclick="add_admin_product_script()">Добавить товар</button>
    </form>
</div>
