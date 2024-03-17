<?php

$xml = simplexml_load_file("paises4.xml");

echo "Nome: {$xml->nome} <br>";
echo "Idioma: {$xml->idioma} <br>";

echo "Estados: {$xml->estados->nome[0]} <br>";

foreach ($xml->estados->nome as $estado){
    echo "Estado: {$estado} <br>";
}

