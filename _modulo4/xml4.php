<?php

$xml = simplexml_load_file("paises2.xml");

echo "Nome: {$xml->nome} \n";
echo "Idioma: {$xml->idioma} \n";

echo "Informações Geográficas \n";
echo "Clima: {$xml->geografia->clima} \n";
echo "Costa: {$xml->geografia->costa} \n";
echo "Pico: {$xml->geografia->pico} \n";