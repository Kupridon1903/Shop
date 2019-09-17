<!doctype html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="js/main.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="navbar-brand">YourBike</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#" id="index_link">Главная<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" id="items" aria-haspopup="true"
                           aria-expanded="false" href="#" onclick="check_items()">
                            Товары
                        </a>
                        <div class="dropdown-menu" id="items_menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#" id="bike_link">Велосипеды</a>
                            <a class="dropdown-item" href="#" id="scooter_link">Самокаты</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#" id="contacts_link">Контакты</a>
                    </li>
                </ul>
            </div>

            <?php

            $fname = '';
            $rights = '';
            if (isset($_SESSION['user_mail'])) {
                include("db.php");

                $mail = $_SESSION['user_mail'];
                $result = mysqli_query($link, "SELECT * FROM users WHERE mail='$mail'");
                $row = mysqli_fetch_array($result);
                $fname = $row['fname'];
                $rights = $row['rights'];

                echo "<ul class='navbar-nav mr-auto' id='authorized'>
                    <li class='nav-item active dropdown'>
                        <a id='login' class='nav-link' href='#' onclick='check_auth()'>Добро пожаловать,
                            " . $fname . "</a>
                        <div class='dropdown-menu' id='login_menu'>
                            <a class='dropdown-item' href='#' id='user_private'>Личный кабинет</a>";
                if ($rights == "admin") echo "<a class='dropdown-item' href='#' id='admin_link'>Админка</a>";
                echo "
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='#' onclick='user_exit()'>Выйти</a>
                        </div>
                    </li>
                </ul>";
            } else {
                echo "<ul class='navbar-nav mr-auto' id='authorized'>
                    <li class='nav-item active dropdown'>
                        <a id='login' class='nav-link' href='#' onclick='check_auth()'>Вход | Регистрация</a>
                        <div class='dropdown-menu' id='login_menu'>
                        
                            <form class='px-4 py-3' id='auth_form'>
                                <div class='form-group'>
                                    <label for='dropdownMail'>Почта</label>
                                    <input type='email' class='form-control' id='dropdownMail'
                                          name='mail' placeholder='mail@mail.ru'>
                                </div>
                                
                                <div class='form-group' style='margin-bottom: 0'>
                                    <label for='dropdownPassword'>Пароль</label>
                                    <input type='password' class='form-control' id='dropdownPassword'
                                           name='password' placeholder='Пароль'>
                                </div>
                                
                                <span class='error_auth' id='wrong_info'>Логин и/или пароль не совпадают</span>
                                
                                <div class='form-group' style='margin-top: 16px'>
                                    <div class='form-check'>
                                        <input type='checkbox' class='form-check-input' id='dropdownCheck'>
                                        <label class='form-check-label' for='dropdownCheck'>
                                            Запомнить меня
                                        </label>
                                    </div>
                                </div>
                                
                                <a role='button' onclick='user_auth()' style='color: whitesmoke' class='btn btn-primary'>Войти</a>
                            </form>
                            
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' id='reg_link' href='#'>Зарегистрироваться</a>
                        </div>
                    </li>
                </ul>";
            }
            ?>
            <a class="nav-link" href="#" id="basket_link"><img id="basket" src="images/basket.png">
                <div id="round_icon">
                    <span id="number_items_basket">0</span>
                </div>
            </a>
        </nav>
    <script>
        var head = jQuery.noConflict();
        head("#wrong_info").hide();
    </script>
    </body>
</html>
