<?php

require_once __DIR__ . "/classes/Record.php";

class Produto extends Record
{
    const TABLENAME = "produto";
}

$produto = new Produto();
$produto->name = "Chocolate";
$produto->preco = 12.99;
$produto->qtde = 2;

echo $produto->load(10) . "<br>";
echo $produto->delete(10). "<br>";
echo $produto->save(). "<br>";