<?php

$xml = simplexml_load_file("paises5.xml");

//var_dump($xml->estados->estado);

foreach ($xml->estados->estado as $estado){
    echo "<br>";
    foreach ($estado->attributes() as $key => $value){
        echo "{$key}: $value ";
    }
}