<pre>
<?php

// $cores = array("Vermelhor", "Verde", "Azul");
// $cores = ["Vermelhor", "Verde", "Azul"];

// $cores = [];
// $cores[] = "Vermelhor";
// $cores[] = "Verde";
// $cores[] = "Azul";


$cores = [];
$cores[1] = "Vermelho";
$cores[3] = "Verde";
$cores[5] = "Azul";


var_dump($cores);
print_r($cores);

$pessoa = [];
$pessoa["nome"] = "Maria";
$pessoa["endereco"] = "Rua tal";
$pessoa["nascimento"] = "1990-01-01";
$pessoa["cidade"] = "Tilanbuco";

var_dump($pessoa);

echo "<br>";
foreach($pessoa as $informacao){
    echo $informacao . "<br>";
}

echo "<br>";

$carros = [
    "palio" => [
        'cor' => 'Azul',
        'marca' => 'fiat',
        'ano' => 2002,
    ],
    "corsa" => [
        'cor' => 'Prata',
        'marca' => 'GM',
        'ano' => 2003
    ]
];

echo $carros["corsa"]["marca"];

echo "<br>";


foreach($carros as $modelo => $informacao)
{
    echo "<b>{$modelo}</b> <br>";
    foreach($informacao as $atributo => $valor)
    {
        echo "{$atributo}: {$valor} <br>";
    }
}


echo "<br>";
var_dump($carros);

echo "<br>";

$cores = ["Vermelho", "Verde", "Azul"];
// $cores[] = "Ciano";
array_push($cores, "Ciano");
array_unshift($cores, "Amarelo");
array_shift($cores);
array_pop($cores);

$cores = array_reverse($cores);

$resultado = array_merge($cores, ['Ciano', 'Magenta']);
var_dump($resultado);

$car = [];
$car[10001] = 'Palio 2002';
$car[73933] = 'Corsa 2003';
$car[82634] = 'Celta 2005';
$car[12838] = 'Uno 1999';

// sort($car);
// asort($car);
ksort($car);

var_dump(array_keys($car));
var_dump(array_values($car));
var_dump(count($car));
var_dump(in_array('Uno 1999', $car));
var_dump($car);

echo "<br>";

$data = "2024-10-20";
$partes = explode("-", $data);
var_dump($partes);

echo implode("-", $partes);