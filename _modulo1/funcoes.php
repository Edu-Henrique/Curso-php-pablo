<?php

function calcula_imc(float $peso, float $altura): float
{
    return $peso / ($altura * $altura);
}

echo calcula_imc(75, 1.70);

echo "<br>";
echo "<br>";    

function kmToMilhas($km)
{
    global $total;
    $total += $km;
    return  $km * 0.6;
}

echo kmToMilhas(100). '<br>';
echo kmToMilhas(100). '<br>';
echo kmToMilhas(100). '<br>';

var_dump($total);

echo "<br>";
echo "<br>";

function percorre(float $km): void
{
    static $kmTotal;
    $kmTotal += $km;
    echo "Percorreu mais {$km} de {$kmTotal} <br>";
}

percorre(100);
percorre(100);
percorre(100);

function incrementa(&$variavel, $valor)
{
    $variavel += $valor;
}

$teste = 100;
incrementa($teste, 20);

var_dump($teste);

echo "<br>";
echo "<br>";

$lista = ["a", "c", "d", "b"];

sort($lista);
var_dump($lista);

echo "<br>";
echo "<br>";

$remove_acento = function($str){
    return str_replace(['á','é','í','ó','ú'],
                       ['a','e','i','o','u'],
                       $str);
};



var_dump($remove_acento('bábébíbóbú'));

function teste($palavra, $funcao)
{
    $palavra = $funcao($palavra);
    return strtoupper($palavra);
}

var_dump(teste("bábébíbóbú", $remove_acento));