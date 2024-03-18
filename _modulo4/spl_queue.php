<?php
//classe exclusiva para manipulaçãoi de filas
$ingredientes = new SplQueue();

$ingredientes->enqueue("Peixe");
$ingredientes->enqueue("Sal");
$ingredientes->enqueue("Limão");

foreach ($ingredientes as $item){
    echo "Item: {$item} <br>";
}
echo "<br>";
echo "<br>";
echo $ingredientes->count() . "<br>";
echo $ingredientes->dequeue() . "<br>";
echo $ingredientes->count() . "<br>";
echo $ingredientes->dequeue() . "<br>";
echo $ingredientes->count() . "<br>";
echo $ingredientes->dequeue() . "<br>";
