<?php

$xml = simplexml_load_file("paises.xml");

echo "Nome: {$xml->nome} \n";
echo "Idioma: {$xml->idioma} \n";
echo "Capital: {$xml->capital} \n";
echo "Moeda: {$xml->moeda} \n";
echo "Prefixo: {$xml->prefixo} \n";