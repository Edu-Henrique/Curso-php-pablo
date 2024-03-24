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
    Transaction::setLogger(new LoggerTXT(__DIR__ . "/tmp/log_collection_delete.txt"));

    $criteria = new Criteria();
    $criteria->add("descricao", "like", "%WEBC%");
    $criteria->add("descricao", "like", "%FILMAD%", "OR");

    $repository = new Repository("Produto");
    $repository->delete($criteria);

    Transaction::close();

} catch (Exception $e){
    echo $e->getMessage();
    Transaction::rollback();
}