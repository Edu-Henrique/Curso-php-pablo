<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
}

$jose = new Funcionario();
$jose->nome = "José da Silva";
$jose->salario = 2000;
$jose->departamento = "Financeiro";

echo "<pre>";
var_dump(get_object_vars($jose));
echo "</pre>";