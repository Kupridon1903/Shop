<?php
$link = mysqli_connect('localhost', 'root','Pw85BaaO' , 'shop')
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");
