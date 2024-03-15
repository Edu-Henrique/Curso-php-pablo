<pre>
<?php

// $nome = "eduardo";
// $sobrenome = "henrique";

// $nomeCompleto = "{$nome} {$sobrenome}x";

// print $nome . " ". $sobrenome;
// print $nomeCompleto;

// print 'I"m atomic';
// print "{$nome} \" {$sobrenome}";

// $a = 5;
// $b = '4.5';

// var_dump($a * $b);

// $a = 5;
// $b = &$a;

// $a = 10;

// var_dump($a);
// var_dump($b);


// $peso = 30;
// if($peso > 25)
//     print 'Multa';

// $multa = ($peso > 25);
// var_dump($multa);


// $nome = '';

// if($nome){
//     echo "nome tem conteudo";
// }

// $list = [
//     'cor' => 'azul',
//     'nome' => 'azul escuro'
// ];

// var_dump($list);

$pessoa1 = new stdClass;
$pessoa1->nome = 'Pedro';
$pessoa1->altura = 1.65;

$pessoa2 = $pessoa1;
$pessoa2->nome = "João";

var_dump($pessoa1, $pessoa2);