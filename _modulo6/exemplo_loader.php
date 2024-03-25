<?php

require_once __DIR__ . "/Lib/Livro/Core/ClassLoader.php";
$al = new Livro\Core\ClassLoader();
$al->addNamespace("Livro", "Lib/Livro");
$al->register();

require_once __DIR__ . "/Lib/Livro/Core/AppLoader.php";
$al2 = new Livro\Core\AppLoader();
$al2->addDirectory("App/Control");
$al2->addDirectory("App/Model");
$al2->register();

use Livro\Database\Transaction;
use Livro\Database\Connection;

$obj1 = Connection::open("livro");
var_dump($obj1);


Transaction::open("livro");
var_dump(new Pessoa(1));
Transaction::close();