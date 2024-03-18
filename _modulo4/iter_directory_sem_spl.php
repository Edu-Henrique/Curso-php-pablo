<?php

$dir = opendir("D:\php\81\htdocs\PHP Design Patterns\Curso-php-pablo\_modulo4");

while($arquivo = readdir($dir)){
    echo "{$arquivo} <br>";
}

closedir($dir);