<?php
session_start();

unset($_SESSION['user_mail']);
unset($_SESSION['user_pass']);

exit();
