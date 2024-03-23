<?php
require_once __DIR__ . "/classes/api/Transaction.php";
require_once __DIR__ . "/classes/api/Connection.php";
require_once __DIR__ . "/classes/api/Logger.php";
require_once __DIR__ . "/classes/api/LoggerTXT.php";
require_once __DIR__ . "/classes/api/Record.php";
require_once __DIR__ . "/classes/model/Produto.php";

try {
    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT(__DIR__ . "/tmp/log_delete.txt"));

    $p1 = Produto::find(25);
    if ($p1){
        echo "Descrição: {$p1->descricao} <br>";
        $p1->delete();
    }

    Transaction::close();
} catch (Exception $e){
    Transaction::rollback();
    echo $e->getMessage();
}