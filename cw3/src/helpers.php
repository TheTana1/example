<?php


function handleError(string $error): string
{
    return "\033[31m" . $error ."\r\n \033[0m";
}

function handleHelp(): string
{
    $help = <<<HELP
Доступные команды
help - вывод данной подсказки
add-post - создать новый  пост

HELP;
    return $help;
}