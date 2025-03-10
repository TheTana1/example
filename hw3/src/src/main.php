<?php

function main(): string
{
    $command = parseCommand();

    if (function_exists($command)){
        $result = $command();
    } else{
        $result = handleError("Error: Нет такой функции");
    }

    return $result;
}

function parseCommand(): string
{
    $functionName = $_SERVER['argv'][1] ?? 'help';

    return match($functionName){
        'help' => 'handleHelp',
        'add-post' => 'addPost',
        'read-all-posts' => 'readAllPosts',
        'read-post' => 'readPost',
        'clear-all-posts' => 'clearAllPosts',
        'search-post' => 'searchPost',
        'clear-post' => 'clearPost',
        default => 'handleHelp'
    };
}