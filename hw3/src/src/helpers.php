<?php

function handleError(string $error): string
{
    return "\033[31m" . $error . "\r\n \033[97m";
}

function handleHelp(): string
{

    $help = db_ini['db_start_text'];
    $help .= db_ini['db_commands'];

    return $help;
}