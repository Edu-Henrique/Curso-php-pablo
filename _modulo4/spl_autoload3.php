<?php

$al = new ApplicationLoader();
$al->register();

class ApplicationLoader
{
    public function register()
    {
        spl_autoload_register([$this, "loadClass"]);
    }
    public function loadClass($class)
    {
        if(file_exists("app/{$class}.php")){
            require_once "app/{$class}.php";
            return true;
        }
    }
}

var_dump(new Pessoa());