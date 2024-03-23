<?php
require_once __DIR__ . "/classes/api/Transaction.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Logger.php";
require_once __DIR__ . "/classes/api/LoggerTXT.php";
require_once __DIR__ . "/classes/api/Record.php";
require_once __DIR__ . "/classes/model/Produto.php";

try {
    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT(__DIR__ . "/tmp/log_update.txt"));


    $p1 = Produto::find(24);
    if ($p1){
        echo "Descrição: {$p1->descricao} <br>";
        $p1->estoque += 10;
        $p1->store();
    }

    Transaction::close();
} catch (Exception $e){
    Transaction::rollback();
    echo $e->getMessage();
}