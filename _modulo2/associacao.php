<?php

require_once __DIR__ . "/classes/fabricante.php";
require_once __DIR__ . "/classes/produto.php";

$p1 = new Produto("Chocolate", 56, 12.99);
$f1 = new Fabricante("Nestle", "Rua das loucuras", "56126163511");
$p1->setFabricante($f1);
// $f1->setNome("kkkkkkk");

echo "O Fabricante do produto {$p1->getDescricao()} é {$p1->getFabricante()->getNome()}";

echo "<pre>";
var_dump($p1, $f1);
echo "</pre>";