<?php

declare(strict_types=1);

// $codigo = 5.0;
// $nome = 'teste';

// var_dump($codigo);
// var_dump($nome);

// var_dump(7 + '5');

function calcula_imc(float $peso, float $altura): float
{
    var_dump($peso, $altura);
    return $peso / ($altura * $altura);
}
$peso = '75';
var_dump(calcula_imc((float) $peso,1.69));