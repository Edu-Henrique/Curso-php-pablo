<?php
require_once __DIR__ . "/classes/api/Transaction.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Criteria.php";
require_once __DIR__ . "/classes/api/Repository.php";
require_once __DIR__ . "/classes/api/Record.php";
require_once __DIR__ . "/classes/api/Logger.php";
require_once __DIR__ . "/classes/api/LoggerTXT.php";
require_once __DIR__ . "/classes/model/Produto.php";

try {

    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT(__DIR__ . "/tmp/log_collection_get.txt"));

    $criteria = new Criteria();
    $criteria->add("estoque", ">", 10);
    $criteria->add("origem", "=", "N");

    $repository = new Repository("Produto");
    $produtos = $repository->load($criteria);
    if($produtos){
        foreach ($produtos as $produto){
            echo "ID: {$produto->id}";
            echo " - Descrição: {$produto->descricao}";
            echo " - estoque: {$produto->estoque} <br>";
        }
    }

    echo "quantidade: {$repository->count($criteria)}";

    Transaction::close();

} catch (Exception $e){
    echo $e->getMessage();
    Transaction::rollback();
}