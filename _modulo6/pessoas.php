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

$pagina = new PessoaControl();
//$pagina->listar();
$pagina->show($_GET);