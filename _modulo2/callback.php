<?php

function apresenta($nome)
{
    echo "Olá {$nome}";
}

// apresenta("Pablo"); 

$funcao = "apresenta";

call_user_func($funcao, "Eduardo");

echo "<br>";

class Pessoa
{
    public static function apresenta($nome)
    {
        echo "Olá {$nome}";
    }
}

Pessoa::apresenta("Eduardo Henrique");

echo "<br>";

$classe = "Pessoa";
$metodo = "apresenta";

$obj = new Pessoa;

call_user_func([$classe, $metodo], "Eduardo Henrique");
echo "<br>";
call_user_func([$obj, $metodo], "Eduardo");