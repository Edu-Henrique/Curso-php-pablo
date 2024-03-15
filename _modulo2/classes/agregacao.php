<?php

require_once __DIR__ . "/classes/fabricante.php";
require_once __DIR__ . "/classes/Caracteristica.php";
require_once __DIR__ . "/classes/Cesta.php";
require_once __DIR__ . "/classes/produto.php";



$c1 = new Cesta;

$p1 = new Produto("Chocolate", 50, 12.99);
$p2 = new Produto("Café", 150, 8.99);
$p3 = new Produto("Mostarda", 10, 7.49);

$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);

foreach($c1->getItens() as $item)
{
    echo "Item: {$item->getDescricao()} <br>";
}

echo "<pre>";
var_dump($c1);
echo "</pre>";