<?php

$ingredientes = new SplStack();

$ingredientes->push("Peixe");
$ingredientes->push("Sal");
$ingredientes->push("Limão");

foreach ($ingredientes as $item){
    echo "Item: {$item} <br>";
}
echo '<br>';
echo '<br>';

echo $ingredientes->count() . "<br>";
echo $ingredientes->pop() . "<br>";
echo $ingredientes->count() . "<br>";
echo $ingredientes->pop() . "<br>";
echo $ingredientes->count() . "<br>";
echo $ingredientes->pop() . "<br>";