<?php

$nome = "Maria";
$sobrenome = " da Silva";

// $nome_completo = $nome . $sobrenome;

$nome_completo = "{$nome} {$sobrenome}";

var_dump($nome_completo);

echo "<br>";

echo "Exemplo de 'aspas'";
echo "<br>";
echo 'Exemplo de "aspas"';
echo "<br>";
echo 'Exemplo de \'aspas\'';
echo "<br>";
echo "Exemplo de \"aspas\"";

echo "<br>";

echo strtoupper($nome . $sobrenome);
echo "<br>";
echo strtolower($nome . $sobrenome);
echo "<br>";
echo strlen($nome);
echo "<br>";
echo substr($nome . $sobrenome, 0, 5);
echo "<br>";
echo substr($nome . $sobrenome, 6, 8);
echo "<br>";
echo substr($nome . $sobrenome, -5);
echo "<br>";
echo str_replace('a', 'e', $nome . $sobrenome);