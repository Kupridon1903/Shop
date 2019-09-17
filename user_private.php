<link rel="stylesheet" type="text/css" href="css/registration.css">
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

<?php
session_start();

$mail = $_SESSION['user_mail'];

include("db.php");

$result = mysqli_query($link, "SELECT * FROM users WHERE mail='$mail'");
$row = mysqli_fetch_array($result);

    echo "<div >
        <form class='form-signin' method='post' id='private_form'>
            <div class='text-center mb-4'>
                <h1 class='h3 mb-3 font-weight-normal'>Личный кабинет</h1>
            </div>

            <div class='form-label-group'>
                <input type='text' id='inputName' autocomplete='off' class='form-control'
                 placeholder='Имя' name='fname' required value='".$row['fname']."'>
                <label for='inputName'>Имя</label>
            </div>

            <div class='form-label-group'>
                <input type='text' id='inputFam' class='form-control' autocomplete='off'
                 placeholder='Фамилия' name='fam' required value='".$row['fam']."'>
                <label for='inputFam'>Фамилия</label>
            </div>
            
            <div class='text-center mb-4'>
                <h1 class='h3 mb-3 font-weight-normal'>Изменение пароля</h1>
            </div>

            <div class='form-label-group' style='margin-bottom: 0'>
                <input type='password' id='oldpass' class='form-control' autocomplete='off'
                 placeholder='Пароль' name='oldpass' onkeyup='check_oldpass()'>
                <label for='inputPassword'>Старый пароль</label>
            </div>
            
            <span class='error_note' id='wrong_oldpass'>Пароль неверный</span>
            
            <div class='form-label-group' style='margin-top: 16px'>
                <input type='password' id='newpass' class='form-control' autocomplete='off'
                 placeholder='Пароль' name='newpass' onkeyup='check_pass()' >
                <label for='inputPassword'>Новый пароль</label>
            </div>
            
            <div class='form-label-group' style='margin-bottom: 0'>
                <input type='password' id='compass' class='form-control' autocomplete='off'
                 placeholder='Пароль' name='compass' onkeyup='check_pass()'>
                <label for='inputPassword'>Подтверждение пароля</label>
            </div>
            
            <span class='error_note' id='wrong_pass'>Пароли не совпадают</span>
            
            <input type='hidden' id='user_id' name='user_id' value='".$row['id']."'>

            <button type='button' class='btn btn-lg btn-primary btn-block' id='save_info' onclick='save_data()' style='margin-top: 16px'>Сохранить</button>
        </form>
    </div>";
?>

<script>
    $("#wrong_pass").hide();
    $("#wrong_oldpass").hide();
    function check_pass() {
        var pass = $("#newpass").val();
        var repeat = $("#compass").val();
        if (!(pass === repeat)) {
            $("#wrong_pass").show();
            $("#save_info").prop("disabled", true);
        } else {
            $("#wrong_pass").hide();
            $("#save_info").prop("disabled", false);
        }
    }
    function check_oldpass() {
        var password = $("#oldpass").val();
        var user_id = $("#user_id").val();
        $.ajax({
            type : 'POST',
            url :'check_oldpass.php',
            data: {
                password: password,
                user_id : user_id
            },
            success: function(answer){
                switch (answer) {
                    case "0":
                        $("#wrong_oldpass").show();
                        $("#save_info").prop("disabled", true);
                        break;
                    case "1":
                        $("#wrong_oldpass").hide();
                        $("#save_info").prop("disabled", false);
                        break;
                    default:
                        $("#wrong_oldpass").hide();
                        $("#save_info").prop("disabled", false);
                        break;
                }
            }
        });
    }
    function save_data() {
        var pass = $("#newpass").val();
        var repeat = $("#compass").val();
        var password = $("#oldpass").val();
        var saveInput = $('#private_form').find('input').serialize();
        if (((pass != "") || (repeat != "")) && (password == "")){
            alert('При смене пароля необходимо указывать старый пароль');
            $("#save_info").prop("disabled", true);
            return;
        }
        $.ajax({
            type : 'POST',
            url :'user_private_save.php',
            data: saveInput,
            success: function(answer){
                    $("#main").load("main.php");
                    $("#login").html("Добро пожаловать, " + answer);
            }
        });
    }
</script>
