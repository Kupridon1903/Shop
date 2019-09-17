<?php
session_start();

if (isset($_REQUEST['login'])) {
    $login = $_REQUEST['login'];
    if ($login == '') {
        unset($login);
    }
}
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_REQUEST['password'])) {
    $password = $_REQUEST['password'];
    if ($password == '') {
        unset($password);
    }
}
if (isset($_REQUEST['fam'])) {
    $fam = $_REQUEST['fam'];
    if ($fam == '') {
        unset($fam);
    }
}
if (isset($_REQUEST['name'])) {
    $fname = $_REQUEST['name'];
    if ($fname == '') {
        unset($fname);
    }
}
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    if ($email == '') {
        unset($email);
    }
}


$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$fam = stripslashes($fam);
$fam = htmlspecialchars($fam);
$fname = stripslashes($fname);
$fname = htmlspecialchars($fname);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$login = trim($login);
$password = trim($password);
$fam = trim($fam);
$fname = trim($fname);
$email = trim($email);

if (($login == "") || ($password == "") || ($fam == "") ||($fname == "") || ($email == "")){
    exit("die");
}

include("db.php");

$password = password_hash($password, PASSWORD_DEFAULT);

$sql_add = mysqli_query($link,"INSERT INTO users (fam, fname, login, password, mail) VALUES('$fam','$fname','$login','$password','$email')");

if ($sql_add == 'TRUE') {
    $_SESSION['user_mail'] = $email;

    $result = mysqli_query($link, "SELECT * FROM users WHERE mail='$email'");
    $row = mysqli_fetch_array($result);
    $fname = $row['fname'];
    $rights = $row['rights'];

    echo "<ul class='navbar-nav mr-auto' id='authorized' onclick='check_auth()'>
                    <li class='nav-item active dropdown'>
                        <a id='login' class='nav-link' href='#'>Добро пожаловать,
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
    echo "true";
}
