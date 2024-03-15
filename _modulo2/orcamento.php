<?php

require_once __DIR__ . "/classes/OrcavelInterface.php";
require_once __DIR__ . "/classes/produto2.php";
require_once __DIR__ . "/classes/Orcamento.php";
require_once __DIR__ . "/classes/Servico.php";

$orc = new Orcamento;
$orc->adiciona(new Produto("Máquina de Café", 10, 129.99), 1);
$orc->adiciona(new Produto("Barbeador eletrico", 15, 170), 3);
$orc->adiciona(new Produto("Chocolate", 50, 12.99), 8);

$orc->adiciona(new Servico("Conserto", 120), 1);
$orc->adiciona(new Servico("Manutencao", 199), 2);


echo $orc->calculaTotal();

echo "<pre>";
var_dump($orc);
echo "<pre>";
