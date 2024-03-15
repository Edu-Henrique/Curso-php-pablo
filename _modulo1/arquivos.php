<?php

// $handler = fopen('teste.txt', 'r');

// while(!feof($handler)){
//     echo fgets($handler, 4096) . "<br>";
// }


// $handler = fopen('teste2.txt', 'w');
// fwrite($handler, "linha 1". PHP_EOL);
// fwrite($handler, "linha 2". PHP_EOL);
// fwrite($handler, "linha 3". PHP_EOL);
// fclose($handler);

// echo file_get_contents('teste.txt');

// file_put_contents('teste3.txt', "a\nb\nc\n");


$arquivo = file('teste.txt');
foreach($arquivo as $linha)
{
    echo $linha . "<br>";
}

// copy('teste2.txt', 'teste2 - copy.txt');

// rename('D:/php/81/htdocs/PHP Design Patterns/modulo1/teste2 - copy.txt', 
// 'D:/php/81/htdocs/PHP Design Patterns/modulo1/novo.txt');

// unlink('teste2 - copy.txt');

if(file_exists('teste2.txt'))
{
    echo "Arquivo teste2.txt existe";
}

// mkdir('teste', 0777);

// rmdir('teste');


echo "<br>";
echo "<br>";
$arquivos =  scandir(__DIR__);

foreach($arquivos as $arquivo)
{
    echo $arquivo . "<br>";
}



// echo __DIR__ . '\\novo.txt';