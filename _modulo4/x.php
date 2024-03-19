<?php

spl_autoload_register(function($class){
    $dir = __DIR__ . "\\" . $class;
    $path = str_replace("\\", "/", $dir) . ".php";
    require_once $path;
});

var_dump(new \Library\Widgets\Field);