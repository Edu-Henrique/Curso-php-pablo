<?php

$dados = [
    "salmão", "tilápia", "sardinha", "badejo", "pescada", "dourado", "corvina", "cavala", "bagre"
];

$objArray = new ArrayObject($dados);

$objArray->append("bacalhau");

echo $objArray->offsetGet(2) . "<br>";
$objArray->offsetSet(2, "linguado");
$objArray->offsetUnset(4);
echo $objArray->count() . "<br>";

if($objArray->offsetExists(10)){
    echo "Posição 10 encontrada <br>";
} else{
    echo "Posição 10 não encontrada <br>";
}

$objArray[] = "atum";

$objArray->natsort();

foreach ($objArray as $item){
    echo "Item: {$item} <br>";
}

echo $objArray->serialize();