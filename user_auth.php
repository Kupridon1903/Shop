<?php
session_start();

if (isset($_REQUEST['mail'])) {
    $mail = $_REQUEST['mail'];
    if ($mail == '') {
        unset($mail);
    }
}

if (isset($_REQUEST['password'])) {
    $password = $_REQUEST['password'];
    if ($password == '') {
        unset($password);
    }
}

$mail = stripslashes($mail);
$mail = htmlspecialchars($mail);
$mail = trim($mail);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$password = trim($password);


include("db.php");

$mail = mysqli_real_escape_string($link, $mail);

$query = "SELECT password FROM users WHERE mail='$mail'";

$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);


if (password_verify($password, $row['password'])) {
    $_SESSION['user_mail'] = $mail;

    $result = mysqli_query($link, "SELECT * FROM users WHERE mail='$mail'");
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
}
else {
    echo "true";
}

