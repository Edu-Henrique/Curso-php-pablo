<?php

class Pessoa
{
    private $nome;
    private $genero;
    const GENEROS = [
        "M" => "Masculino",
        "F" => "Feminino"
    ];

    public function __construct($nome, $genero)
    {
        $this->nome = $nome;
        $this->genero = $genero ;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNomeGenero()
    {
        return self::GENEROS[$this->genero];
    }
}

$p1 = new Pessoa("Maria da Silva", "F");
$p2 = new Pessoa("Carlos Pereira", "M");

echo $p1->getNome() . "<br>";
echo $p1->getNomeGenero() . "<br>";
echo $p2->getNome() . "<br>";
echo $p2->getNomeGenero() . "<br>";


// echo Pessoa::GENEROS["M"];