<?php
require_once __DIR__ . "/classes/ar/ProdutoComTransacao.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Transaction.php";


try {
    Transaction::open("estoque");

    $produto = new ProdutoComTransacao();
    $produto->descricao = "Chocolate Amargo";
    $produto->estoque = 80;
    $produto->preco_custo = 5.99;
    $produto->preco_venda = 10.99;
    $produto->codigo_barras = "7251641651641";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();

    Transaction::close();
} catch (Exception $e){
    Transaction::rollback();
    echo $e->getMessage();
}