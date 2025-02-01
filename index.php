<?php
$name = readline("Enter your name: ");

echo "hello {$name}\n";

$number = PHP_INT_MAX; //создание переменной
var_dump($number);
$number++;
var_dump($number);

$number = 2 . " попугаев"; //конкатенация
//$number = 2 + "попугаев"; //работает как плюс
var_dump($number);
//блок текста
$str = <<<START
hell $number asd
'sad'\n
START;

echo $str;

$a1 =1;
$a2 =2;
$a3 =3;
$i = 1;
$name = 'a3';
var_dump($$name);