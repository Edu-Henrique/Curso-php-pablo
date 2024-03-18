<?php

require_once __DIR__ . "/veiculo.php";

$rp = new ReflectionProperty("Automovel", "placa");

echo $rp->getName() . "<br>";
echo $rp->isPrivate() ? "É private <br>" : "Não é private <br>";
echo $rp->isStatic() ? "É static <br>" : "Não é static <br>";
