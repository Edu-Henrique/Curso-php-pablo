<?php

require_once __DIR__ . "/classes/Conta.php";
require_once __DIR__ . "/classes/ContaCorrente.php";
require_once __DIR__ . "/classes/ContaPoupanca.php";

$p = new ContaPoupanca("1651-8", "165156154", 1800);
echo $p->getSaldo(). "<br>";
$p->depositar(200);
echo $p->getSaldo(). "<br>";
$p->retirar(138);
echo $p->getSaldo(). "<br>";


echo "<pre>";
var_dump($p);
echo "</pre>";