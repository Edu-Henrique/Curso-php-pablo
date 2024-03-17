<?php

$xml = simplexml_load_file("paises5.xml");

foreach ($xml->estados->estado as $estado){
    echo "Estado: {$estado['nome']}, Capital: {$estado['capital']} <br>";
}