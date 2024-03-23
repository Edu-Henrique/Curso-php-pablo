<?php
require_once __DIR__ . "/classes/api/Transaction.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Logger.php";
require_once __DIR__ . "/classes/api/LoggerTXT.php";
require_once __DIR__ . "/classes/api/Record.php";
require_once __DIR__ . "/classes/model/Produto.php";

try {
    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT(__DIR__ . "/tmp/log_insert.txt"));

    $p1 = new Produto();
    $p1->descricao = "Guaraná Antarctica";
    $p1->estoque = 80;
    $p1->preco_custo = 4.99;
    $p1->preco_venda = 8.49;
    $p1->codigo_barras = "7549644534852";
    $p1->data_cadastro = date("Y-m-d");
    $p1->origem = "N";
    $p1->store();


    Transaction::close();
} catch (Exception $e){
    Transaction::rollback();
    echo $e->getMessage();
}