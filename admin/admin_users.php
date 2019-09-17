
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script src="js/main.js"></script>


<div class='container-fluid bg-light mt-2' style="color: #000; font-weight: bold">
    <div class='row'>
        <div class='col' id='img_col'>
            <span>Имя</span>
        </div>
        <div class='col'>
            <span>Фамилия</span>
        </div>
        <div class='col pr-4'>
            <span>Логин</span>
        </div>
        <div class='col-md-auto pr-4'>
            <span>Удаление</span>
        </div>
    </div>
</div>

<?php

include "../db.php";

$result = mysqli_query($link, "SELECT * FROM users WHERE rights = 'user'");

while ($row = mysqli_fetch_array($result)) {
    echo "
                    <div class='container-fluid bg-light mt-2'>
                        <div class='row'>
                            <div class='col'>
                                <span>" . $row['fname'] . "</span>
                            </div>
                            <div class='col'>
                                <span>" . $row['fam'] . "</span>
                            </div>
                            <div class='col'>
                                <span>" . $row['login'] . "</span>
                            </div>
                            <div class='col-md-auto'>
                                <button type='button' class='btn btn-danger' onclick='delete_admin_user(" . $row['id'] . ")'>Удалить</button>
                            </div>
                        </div>
                    </div>";
}
?>