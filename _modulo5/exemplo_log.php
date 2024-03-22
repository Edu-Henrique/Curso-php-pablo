<?php
require_once __DIR__ . "/classes/ar/ProdutoComTransacaoELog.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Transaction.php";
require_once __DIR__ . "/classes/api/Logger.php";
require_once __DIR__ . "/classes/api/LoggerTXT.php";


try {
    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT("log.txt"));

    $produto = new ProdutoComTransacaoELog();
    $produto->descricao = "Chocolate Branco";
    $produto->estoque = 75;
    $produto->preco_custo = 6.99;
    $produto->preco_venda = 11.99;
    $produto->codigo_barras = "7251641651641";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();

    Transaction::close();
} catch (Exception $e){
    Transaction::rollback();
    echo $e->getMessage();
}