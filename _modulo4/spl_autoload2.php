<?php

spl_autoload_register([new LibraryLoader(), "loadClass"]);
spl_autoload_register([new ApplicationLoader(), "loadClass"]);

class LibraryLoader
{
    public function loadClass($class)
    {
        if(file_exists("lib/{$class}.php")){
            require_once "lib/{$class}.php";
            return true;
        }
    }
}

class ApplicationLoader
{
    public function loadClass($class)
    {
        if(file_exists("app/{$class}.php")){
            require_once "app/{$class}.php";
            return true;
        }
    }
}

var_dump(new Pessoa());