<?php

function main():string // возвращает строку 
{
    $command = parseCommand();
     if(function_exists($command))
     {
        $result = $command();
     }
     else{
        $result = handleError("Нет такой функции");
     }
    return $result;
}

function parseCommand():string 
{
    //TODO улучшите код, избавьтесь от дублирования строки handleHelp
    $functionName = 'handleHelp';
    if(isset($_SERVER['argv'][1] )){
        $functionName = match ($_SERVER['argv'][1]) {
            'help' => 'handleHelp',
            'add-post' => 'addPost',
            'read-all-posts' => 'readAllPosts',
            'read-post' =>'readPost',
            'search-post' => 'searchPost',
            default => 'handleHelp'
        };

    }
    return $functionName;
}