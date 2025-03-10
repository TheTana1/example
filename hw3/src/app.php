<?php
require  __DIR__ . '/vendor/autoload.php';
define('db_ini', parse_ini_file("./config/dbConfig.ini"));

$result = main();

echo $result;