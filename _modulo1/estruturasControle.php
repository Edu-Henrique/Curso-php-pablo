<?php
// $salario = 900;
// $tempo = 12;


// if($salario < 1000 and $tempo >= 12)
// {
//     echo 'Promoção';
// }
// else{
//     echo 'Sem Promoção';
// }


// $valor_venda = 100;

// if($valor_venda > 100)
// {
//     $resultado = 'Muito Caro!';
// }
// else
// {
//     $resultado = 'Pode Comprar';
// }

// $resultado = ($valor_venda > 100)? 'Muito Caro!' : 'Pode Comprar';

// var_dump($resultado);

$cont = 1;
while ($cont <= 5)
{
    echo $cont." ";
    $cont++;
}

echo "<br>";
echo "<br>";

for($cont = 1; $cont <= 10; $cont++)
{
    echo $cont . " ";
}

echo "<br>";
echo "<br>";

$tipo = 'pdf';

switch($tipo)
{
    case 'pdf':
        echo "Arquivo PDF";
        break;
    case 'doc':
        echo "Arquivo DOC";
        break;
    default:
        echo "Arquivo Default";
}

echo "<br>";
echo "<br>";


$lista = [
    'maça',
    'laranja',
    'banana'
];

foreach($lista as $fruta)
{
    echo $fruta. "<br>";
}