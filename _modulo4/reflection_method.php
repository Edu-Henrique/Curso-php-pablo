<?php

require_once __DIR__ . "/veiculo.php";

$rm = new ReflectionMethod("Automovel", "setPlaca");

echo $rm->getName() . "<br>";

echo $rm->isPrivate() ? "É private <br>" : "Não é private <br>";
echo $rm->isAbstract() ? "É abstract <br>" : "Não é abstract <br>";
echo $rm->isFinal() ? "É final <br>" : "Não é final <br>";

echo "<pre>";
print_r($rm->getParameters());