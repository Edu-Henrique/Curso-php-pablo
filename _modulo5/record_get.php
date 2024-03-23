<?php
require_once __DIR__ . "/classes/api/Transaction.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Logger.php";
require_once __DIR__ . "/classes/api/LoggerTXT.php";
require_once __DIR__ . "/classes/api/Record.php";
require_once __DIR__ . "/classes/model/Produto.php";

try {
    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT(__DIR__ ."/tmp/log_get.txt"));

    $p1 = new Produto(23);
    echo "Descrição: {$p1->descricao} <br>";

    $p2 = Produto::find(22);
    if ($p2){
        echo "Descrição: {$p2->descricao} <br>";
    }




    Transaction::close();
} catch (Exception $e){
    Transaction::rollback();
    echo $e->getMessage();
}