<?php

require_once __DIR__ . "/classes/CSVParser.php";

$csv = new CSVParser("clientes.csv", ";");

try {
    $csv->parse();
    while($row = $csv->fetch()){
        // var_dump($row);
        echo "<p>{$row['Cliente']} - {$row['Cidade']} - {$row['Sexo']}</p> \n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}    