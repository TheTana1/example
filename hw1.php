<?php
$a = 7;
$b = 5;
echo "a = {$a}, b = {$b}\n";
//вариант_1: 3-я переменная
$tmp = $a;
$a = $b;
$b = $tmp;
echo "3-я переменная: a = {$a}, b = {$b}\n";
//вариант_2: сложение и вычитание 
//     также (умножение и деление)
$a = 7;
$b = 5;
echo "a = {$a}, b = {$b}\n";
$a += $b;
$b = $a - $b;
$a = $a - $b;
echo "сложение и вычитание: a = {$a}, b = {$b}\n";
//вариант_3: битовые операции XOR
$a = 7;
$b = 5;
echo "a = {$a}, b = {$b}\n";
$a = $a ^ $b; 
echo "a = a ^ b; a = {$a}\n";
$b = $b ^ $a; 
echo "b = b ^ a; b = {$b}\n";
$a = $a ^ $b;
echo "a = a ^ b; a = {$a}\n";
echo "битовые операции XOR: a = {$a}, b = {$b}\n";
//вариант_4: битовые операции сложение и вычитание
$a = 7;
$b = 5;
echo "a = {$a}, b = {$b}\n";
echo "a = (a & b) + (a | b); a = ". ($a & $b) . " + ". ($a | $b) . "\n";
$a = ($a & $b) + ($a | $b);
echo "a = $a\n";
echo "b = a + (~b) + 1; b = " . $a + (~$b) + 1 . "\n";
$b = $a + (~$b) + 1;
echo "a = a + (~b) + 1; a = " . $a + (~$b) + 1 . "\n";
$a = $a + (~$b) + 1;
echo "битовые операции +/-: a = {$a}, b = {$b}\n";
