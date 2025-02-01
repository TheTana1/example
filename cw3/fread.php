<?php

$file = fopen("data.txt","r");
$text = '';
while (!feof($file)) {
    
    $text .= fgets($file); //$text = $text . fgets($file)
}
//в php строки хранятся в виде списков(list) с указателями на конец и начало
echo $text;

fclose($file);