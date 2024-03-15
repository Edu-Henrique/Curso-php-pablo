<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
}

class Estagiario extends Funcionario
{
    public $bolsa;
}


$jose = new Funcionario();
$joao = new Estagiario();

echo get_class($jose) . "<br>";
echo get_class($joao) . "<br>";
echo get_parent_class($joao) . "<br>";
echo get_parent_class("Estagiario") . "<br>";

var_dump(is_subclass_of($joao, "Funcionario"));
var_dump(is_subclass_of("Estagiario", get_class($jose)));