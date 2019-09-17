
<link rel="stylesheet" type="text/css" href="css/registration.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<div id="form-vertical">
    <form class="form-signin" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputName" autocomplete="off" class="form-control" placeholder="Имя" name="name" required>
            <label for="inputName">Имя</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputFam" autocomplete="off" class="form-control" placeholder="Фамилия" name="fam" required>
            <label for="inputFam">Фамилия</label>
        </div>

        <div class="form-label-group" style="margin-bottom: 0">
            <input type="text" id="inputLogin" autocomplete="off" class="form-control" onkeyup="check_login()" placeholder="Логин" name="login" required>
            <label for="inputLogin">Логин</label>
        </div>

        <span class="error_note" id="wrong_login">Данный логин уже существует</span>

        <div class="form-label-group" style="margin-bottom: 0; margin-top: 16px">
            <input type="email" id="inputEmail" class="form-control" onkeyup="check_email()" placeholder="E-mail" autocomplete="off" name="email" required autofocus="">
            <label for="inputEmail">E-mail</label>
        </div>

        <span class="error_note" id="wrong_email">Данный e-mail уже существует</span>

        <div class="form-label-group" style="margin-top: 16px">
            <input type="password" id="inputPassword" class="form-control" onkeyup="check_pass()" autocomplete="off" placeholder="Пароль" name="password" required>
            <label for="inputPassword">Пароль</label>
        </div>

        <div class="form-label-group" style="margin-bottom: 0">
            <input type="password" id="inputRepeatPassword" class="form-control" onkeyup="check_pass()" autocomplete="off" placeholder="Подтверждение пароля" name="checkpass" required>
            <label for="inputRepeatPassword">Подтверждение пароля</label>
        </div>

        <span class="error_note" id="wrong_pass">Пароли не совпадают</span>

        <button type="button" class="btn btn-lg btn-primary btn-block" id="button_reg" onclick="user_reg()" style="margin-top: 16px">Зарегистрироваться</button>
    </form>
</div>

<script>
    $("#wrong_login").hide();
    $("#wrong_email").hide();
    $("#wrong_pass").hide();
    function check_login() {
        var login = $("#inputLogin").val();
        $.ajax({
            type : 'POST',
            url :'check_login.php',
            data: {
                login: login
            },
            success: function(answer){
                if (answer == 'true'){
                    $("#wrong_login").show();
                    $("#button_reg").prop("disabled", true);
                }
                else{
                    $("#wrong_login").hide();
                    $("#button_reg").prop("disabled", false);
                }
            }
        });
    }
    function check_email() {
        var email = $("#inputEmail").val();
        $.ajax({
            type : 'POST',
            url :'check_email2.php',
            data: {
                email: email
            },
            success: function(answer){
                if (answer == 'true'){
                    $("#wrong_email").show();
                    $("#button_reg").prop("disabled", true);
                }
                else {
                    $("#wrong_email").hide();
                    $("#button_reg").prop("disabled", false);
                }
            }
        });
    }
    function check_pass() {
        var pass = $("#inputPassword").val();
        var repeat = $("#inputRepeatPassword").val();
        if (!(pass === repeat)) {
            $("#wrong_pass").show();
            $("#button_reg").prop("disabled", true);
        }
        else{
            $("#wrong_pass").hide();
            $("#button_reg").prop("disabled", false);
        }
    }
</script>
