<?php

require_once __DIR__ . "/classes/fabricante.php";
require_once __DIR__ . "/classes/Caracteristica.php";
require_once __DIR__ . "/classes/produto.php";

$p1 = new Produto("Chocolate", 10, 12.99);
$p1->addCaracteristica("Cor", "Branco");
$p1->addCaracteristica("Peso", "500gr");

echo "<pre>";
var_dump($p1);
echo "</pre>";

echo "Produto: {$p1->getDescricao()} <br>";
foreach($p1->getCaracteristicas() as $caracteristica)
{
    // $nome = $caracteristica->getNome();
    // $valor = $caracteristica->getValor();
    echo "Característica: {$caracteristica->getNome()} = {$caracteristica->getValor()} <br>";
}