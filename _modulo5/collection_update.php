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
    Transaction::setLogger(new LoggerTXT(__DIR__ . "/tmp/log_collection_update.txt"));

    $criteria = new Criteria();
    $criteria->add("preco_venda", "<=", 35);
    $criteria->add("origem", "=","N");

    $repository = new Repository("Produto");
    $produtos = $repository->load($criteria);

    if($produtos){
        foreach ($produtos as $produto){
            $produto->preco_venda *= 1.3;
            $produto->store();
        }
    }

    Transaction::close();

} catch (Exception $e){
    echo $e->getMessage();
    Transaction::rollback();
}