<?php

$file = fopen('data.txt','a');

fputs($file,"hello world\n"); //fwrite тоже самое

fclose($file); //не обязательное условие
//                          потому что скрипт умирает в конце запроса

