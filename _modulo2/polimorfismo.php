<?php

require_once __DIR__ . "/classes/Conta.php";
require_once __DIR__ . "/classes/ContaCorrente.php";
require_once __DIR__ . "/classes/ContaPoupanca.php";

$contas = [];
$contas[] = new ContaCorrente(1234, "CC.1234", 100, 900);
$contas[] = new ContaPoupanca(1235, "PP.4566", 150);

foreach($contas as $conta)
{
    if($conta instanceof Conta){
        echo $conta->getInfo() . "<br>";
        echo "-- Saldo Atual: {$conta->getSaldo()} <br>";
        
        echo "-- Deposito de 200 <br>";
        $conta->depositar(200);
        echo "-- Saldo Atual: {$conta->getSaldo()} <br>";
        
        if ($conta->retirar(700)){
            echo "-- Retirada de 700 (OK) <br>";
        } else{
            echo "-- Retirada de 700 (não permitida)<br>";
        }
        echo "-- Saldo Atual: {$conta->getSaldo()} <br>";
    }
}