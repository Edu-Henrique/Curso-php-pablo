<?php

spl_autoload_register(function ($class){
    if(file_exists("app/{$class}.php")){
        require_once "app/{$class}.php";
        return true;
    }
});

var_dump(new Pessoa());