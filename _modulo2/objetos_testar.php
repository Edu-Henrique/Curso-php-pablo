<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;

    public function setSalario() {}
    public function getSalario() {}
}

$jose = new Funcionario;

if(method_exists($jose, "setNome")){
    echo "José tem o método setNome <br>";
}


if(method_exists($jose, "setSalario")){
    echo "José tem o método setSalario <br>";
}