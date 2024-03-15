<?php

$produto = new stdClass;
$produto->descricao = "Chocolate";
$produto->estoque = 20;
$produto->preco = 7;

$vetor1 = (array) $produto;

$vetor2 = [
    "descricao" => "Café",
    "estoque" => 8,
    "preco" => 12
];

$produto2 = (object) $vetor2;


echo "<pre>";
var_dump($vetor1, $produto2);
echo "<p>{$produto2->descricao}</p>";
echo "</pre>";