<?php
// echo "<pre>";
// print_r(get_defined_constants());    //список всех констант
//echo __DIR__;     //директория
//echo getcwd();    //linux команда вызова директории
//print_r($_SERVER);  //суперглобальная переменная(видно отовсюду);
//define ('PATH',$_SERVER['DOCUMENT_ROOT']);  //старый метод вызова директории
require __DIR__ . "/math.php";      //обязательно подключит или приложение упадёт с ошибкой 
require_once __DIR__ . "/lib.php";      //подключит и проверит, чтобы не подкл. 2 раза
include __DIR__ . "/1/1.php";


echo sum();
echo sum2();