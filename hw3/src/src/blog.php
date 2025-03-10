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
    if (empty($title)) {
        return handleError("Error: Введите заголовок поста");
    }

    $content = readline("Введите текст поста ");
    if(empty($content)){
        return handleError("Error: Введите текст поста");
    }

    $filename = db_ini['db_file'];

    $file= fopen($filename,'a');
    if(!is_writable($filename)){
        return handleError("Error: файл не открыт для записи");
    }

    $post = $title . "; " . $content .  "\n";
    fwrite($file,$post);
    fclose($file);
    
    return "\n!   Пост добавлен в блог " . db_ini['db_name'] . "   !";
}

function readAllPosts(): string
{
    //TODO реализовать чтение всех постов но вывести только заголовки
    $filename = db_ini['db_file'];

    if(!file_exists( $filename)){
        return handleError("Error: блог не существует");
    }

    if (filesize($filename) === 0) {
        return handleError("Нет постов для отображения.");
    }

    $file = fopen($filename,'r');
    if(stream_get_meta_data($file)['mode'] !== 'r'){
        return  handleError("Error: Ошибка открытия блога");
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

    $filename = db_ini['db_file'];

    if(!isset($_SERVER['argv'][2])){
        return handleError("Error: Не указан номер поста");
    }

    $postNumber = $_SERVER['argv'][2];

    if(!file_exists( $filename)){
        return handleError("Error: Файл не существует");
    }

    $file = fopen($filename,'r');
    if(stream_get_meta_data($file)['mode'] !== 'r'){
        return  handleError("Error: Ошибка открытия блога");
    }

    for($i = 0; $i < $postNumber-1; $i++){
       
        fgets($file);
        if(feof($file))
        {
            return handleError("Выход за пределы количества постов");
        }
    }

    $post = fgets($file);
    echo $post . PHP_EOL;

    fclose($file);
    return "!   Успешно   !";
}

function clearAllPosts(): string
{
     //TODO стереть все посты

    $filename = db_ini['db_file'];
    
    if(!file_exists($filename)){
        return handleError("Error: Постов не существует добавьте посты ");
    }

    $file=fopen($filename,'w');
    if(!is_writable($filename)){
        return handleError("Error: файл не открыт для записи");
    }

    fclose($file);
    return "\n" . "!   Все посты удалены из блога " . db_ini['db_name'] . "   !";
}

function clearPost(): string
{
    //TODO стереть пост по id
    if(!isset($_SERVER['argv'][2])){
        return handleError("Error: Не указан номер поста");
    }
    $postNumber = $_SERVER['argv'][2];

    $filename = db_ini['db_file'];
    if(!file_exists($filename)){
        return handleError("Error: Постов не существует добавьте посты ");
    }

    $file=fopen($filename,'r');
    $fileTmp= fopen('dbTmp.txt', 'w');
    
    if(stream_get_meta_data($file)['mode'] !== 'r'){
        return  handleError("Error: Ошибка открытия блога");
    }
    if(!is_writable("dbTmp.txt")){
        return handleError("Error: файл не открыт для записи");
    }
    //перезапись в резервный файл
    for ($i=0; $i < $postNumber-1; $i++) { 
        if(feof($file)){
            return handleError("Выход за пределы количества постов");
        }
        fwrite($fileTmp,fgets($file));
    }
    fgets($file);
    while(!feof($file))
    {
        fwrite($fileTmp,fgets($file));
    }

    fclose($file);
    fclose($fileTmp);

    //удаление оригинала, переименование копии
    if(!unlink($filename))
    {
        return handleError('Error: При удалении исходного файла произошла ошибка');
    }
    rename('dbTmp.txt', $filename);
    return "!   Пост удалён из блога " . db_ini['db_name'] . "   !";
}

function searchPost(): string
{
    $filename = db_ini['db_file'];
    //TODO необязательно, реализовать поиск по заголовку (можно и по всему телу), поисковый запрос через readline
    
    $text = trim(readline("Введите текст для поиска: "));
    $file = fopen($filename, 'r');
    if(stream_get_meta_data($file)['mode'] !== 'r'){
        return  handleError("Error: Ошибка открытия блога");
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