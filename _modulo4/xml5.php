<?php

$xml = simplexml_load_file("paises3.xml");

$xml->moeda = "Novo Real (R$)";
$xml->geografia->clima = "Temperado";

if(empty($xml->presidente)){
    $xml->addChild("presidente", "Nine");
}


file_put_contents("paises3.xml", $xml->asXML());

echo $xml->asXML();