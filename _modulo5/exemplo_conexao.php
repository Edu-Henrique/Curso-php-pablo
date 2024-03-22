<?php

require_once __DIR__ . "/classes/ar/Produto.php";
require_once __DIR__ . "/classes/api/Connection.php";

try{
    $conn = Connection::open("estoque");
    Produto::setConnection($conn);

    $produto = new Produto();
    $produto->descricao = "Café Torrado";
    $produto->estoque = 100;
    $produto->preco_custo = 4;
    $produto->preco_venda = 7;
    $produto->codigo_barras = "7251641651641";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();
} catch (Exception $e){
    echo $e->getMessage();
}