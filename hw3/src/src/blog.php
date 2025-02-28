<?php

function addPost(): string
{
    //TODO реализовать функционал добавление поста в хранилище db.txt
    // Заголовок и тело поста считывает тут же через readline
    // диалог с пользователем введите заголовок введите пост далее открываем файл если нет вернуть красный цвет ошибки
    // обработать ошибки
    // разделить точкой с запятой
    // в случае успеха вернуть текст что пост добавлен
    $title = readline("Введите заголовок ");
    $content = readline("Введите текст поста ");
    $filename = 'db.txt';
    if (empty($title)) {

        if(empty($content)){
            return handleError("Error: Введите текст поста");
        }

        return handleError("Error: Введите заголовок поста");
    }

    $file= fopen($filename,'a');

    if(!$file){
        return handleError("Error: файл не открыт для записи");
    }

    $post = $title . "; " . $content .  "\n";
    fwrite($file,$post);

    fclose($file);
    return "\n!   Пост добавлен   !";
}

function readAllPosts(): string
{
    //TODO реализовать чтение всех постов но вывести только заголовки
    $filename = 'db.txt';
    if(!file_exists( $filename)){
        return handleError("Error: файл не существует");
    }

    if (filesize($filename) == 0) {
        return handleError("Нет постов для отображения.");
    }

    $file = fopen($filename,'r');
    if(!$file){
        return  handleError("Error: Ошибка открытия файла");
    }
    while(!feof($file)){
        $str = fgets($file);
        $titlePost = strtok($str, ";");

        echo $titlePost . "\n";
    }

    fclose($file);
    return "!   Успешно   !";

}


function readPost(): string
{
    //TODO реализовать чтение одного поста, номер поста считывай из командной строки

    $filename = 'db.txt';

    if(!isset($_SERVER['argv'][2])){
        return handleError("Error: Не указан номер поста");
    }

    $postNumber = $_SERVER['argv'][2];

    if(!file_exists( $filename)){
        return handleError("Error: Файл не существует");
    }

    $file = fopen($filename, 'r');
    if(!$file){
        return  handleError("Error: Невозможно открыть файл для чтения");
    }
   
    for($i = 0; $i < $postNumber-1; $i++){
        fgets($file);

        if(feof($file))
        {
            return handleError("Выход за пределы количества постов");
        }
    }

    $post = fgets($file);
    echo $post . "\n";

    fclose($file);
    return "!   Успешно   !";
}

function clearPosts(): string
{
     //TODO стереть все посты

    $filename = 'db.txt';
    if(!file_exists($filename)){
        return handleError("Error: Постов не существует добавьте посты ");
    }

    $file=fopen($filename,'w');
    if(!$file){
        return handleError("Error: Невозможно очистить файл");
    }

    fclose($file);
    return "!   Все посты удалены   !";
}

function searchPost(): string
{
    $filename = 'db.txt';
    //TODO необязательно, реализовать поиск по заголовку (можно и по всему телу), поисковый запрос через readline
    
    $text = trim(readline("Введите текст для поиска: "));
    $file = fopen($filename, 'r');
    if(!$file){
        return  handleError("Error: Невозможно открыть файл для чтения");
    }
    while(!feof($file)){
        $str = fgets($file);
        $titlePost = explode(";", $str);
        if($text === $titlePost[0] || $text === trim($titlePost[1])){
            echo $str . "\n";
            return "!   Успешно   !";
        }
    }

    return handleError("Error: Не найдено совпадений");
}